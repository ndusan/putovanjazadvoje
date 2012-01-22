<?php

class CompetitionModel extends Model
{
    private $tableLanguage = 'language';
    private $tableContest = 'contest';
    private $tableContestLanguage = 'contest_language';
    private $tableContestPrize = 'contest_prize';
    private $tableContestPrizeLanguage = 'contest_prize_language';
    private $tablePlayers = 'players';
    
    public function getWinners($params)
    {
        try{
            $output = array();

            $query = sprintf("SELECT `c`.`id`, `c`.`winner_image_name`, `cl`.`name`, `cl`.`content`
                                FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `c`.`status`=:status 
                                ORDER BY `c`.`id` DESC", 
                        $this->tableContest, $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $status = 'finished';
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();
           
            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $query = sprintf("SELECT `cp`.`image_name`, `cp`.`winner`,
                                             `cpl`.`title`, `cpl`.`content`
                                      FROM %s AS `cp` 
                                      INNER JOIN %s AS `cpl` ON `cpl`.`contest_prize_id`=`cp`.`id`
                                      INNER JOIN %s AS `l` ON `l`.`id`=`cpl`.`language_id`
                                      WHERE `cp`.`contest_id`=:contestId AND `l`.`iso_code`=:isoCode
                                      ORDER BY `cp`.`id` ASC", 
                                $this->tableContestPrize, $this->tableContestPrizeLanguage, $this->tableLanguage);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':contestId', $r['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
                    $stmt->execute();
                    
                    $r['winners'] = $stmt->fetchAll();
                    $output[] = $r;
                }
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getOfflineContest($params)
    {
        try{
            if(!empty($params['id']) && !is_numeric($params['id'])) return false;
            
            $query = sprintf("SELECT `c`.`id`, `c`.`image_name`, `c`.`puzzle_image_name`, `c`.`winner_image_name`, 
                                `cl`.`name`, `cl`.`content`, `cl`.`description` FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `c`.`status`=:status AND `c`.`type`=:type AND `c`.`id`=:id",
                    $this->tableContest, $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $status = 'active';
            $type = 'offline';
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(\Exception $e){

            return false;
        }
    }
    
    public function getAllOfflinePrizes($params)
    {
        try{
            if(!empty($params['id']) && !is_numeric($params['id'])) return false;
            
            $query = sprintf("SELECT `cp`.`id`, `cp`.`image_name`,
                                `cpl`.`title`, `cpl`.`content` FROM %s AS `cp`
                                INNER JOIN %s AS `cpl` ON `cpl`.`contest_prize_id`=`cp`.`id`
                                INNER JOIN %s AS `c` ON `c`.`id`=`cp`.`contest_id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cpl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `c`.`status`=:status AND `c`.`type`=:type AND `c`.`id`=:id
                                ORDER BY `cp`.`id` ASC",
                    $this->tableContestPrize, $this->tableContestPrizeLanguage, $this->tableContest, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $status = 'active';
            $type = 'offline';
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(\Exception $e){

            return false;
        }
    }
    
    
    public function getAllOnlineContests($params)
    {
        
        try{
            $query = sprintf("SELECT `c`.`id`, `c`.`image_name`, `c`.`puzzle_image_name`, `c`.`winner_image_name`, 
                                `cl`.`name`, `cl`.`content` FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `c`.`status`=:status AND `c`.`type`=:type
                                ORDER BY `c`.`id` DESC",
                    $this->tableContest, $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $status = 'active';
            $type = 'online';
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(\Exception $e){

            return false;
        }
    }
    
    public function getConditions($params)
    {
        try{
            if(!empty($params['id']) && !is_numeric($params['id'])) return false;
            
            $query = sprintf("SELECT `c`.`id`, `c`.`magazine_id`, `c`.`image_name`, `c`.`puzzle_image_name`, `c`.`winner_image_name`, 
                                `cl`.`name`, `cl`.`content`, `cl`.`conditions` FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `c`.`status`=:status AND `c`.`type`=:type AND `c`.`id`=:id",
                    $this->tableContest, $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $status = 'active';
            $type = 'online';
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['contest_id'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(\Exception $e){

            return false;
        }
    }
    
    
    public function setPlayerInfo($tocken, $params)
    {
        try{
            $query = sprintf("INSERT INTO %s SET `firstname`=:firstname, `lastname`=:lastname, `sex`=:sex, `email`=:email, `address`=:address,
                                                 `magazine_id`=:magazineId, `contest_id`=:contestId, `iso_code`=:isoCode, `tocken`=:tocken",
                            $this->tablePlayers);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':firstname', $params['condition']['firstname'], PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $params['condition']['lastname'], PDO::PARAM_STR);
            $stmt->bindParam(':sex', $params['condition']['sex'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['condition']['email'], PDO::PARAM_STR);
            $stmt->bindParam(':address', $params['condition']['address'], PDO::PARAM_STR);
            $stmt->bindParam(':magazineId', $params['condition']['magazine'], PDO::PARAM_INT);
            $stmt->bindParam(':contestId', $params['condition']['contest'], PDO::PARAM_INT);
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':tocken', $tocken, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        }catch(\Exception $e){
            
            return false;
        }
    }
    
    public function checkGame($params){
        
        if(empty($params['tocken'])) return false;
        
        try{
            $output = array();
            
            $query = sprintf("SELECT * FROM %s WHERE `tocken`=:tocken", $this->tablePlayers);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':tocken', $params['tocken'], PDO::PARAM_STR);
            $stmt->execute();

            $output['player'] = $stmt->fetch();
            
            //About game
            $query = sprintf("SELECT `c`.`id`, `c`.`magazine_id`, `c`.`puzzle_image_name`, 
                                `cl`.`name`, `cl`.`content`, `cl`.`description` FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `c`.`status`=:status AND `c`.`type`=:type AND `c`.`id`=:id",
                    $this->tableContest, $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $status = 'active';
            $type = 'online';
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['contest_id'], PDO::PARAM_STR);
            $stmt->execute();

            $output['game'] = $stmt->fetch();
            
            return $output;
        }catch(\Exception $e){
            
            return false;
        }
    }
    
    
    public function updateGame($params)
    {
        try{
            $query = sprintf("UPDATE %s SET `closed`='1' WHERE `tocken`=:tocken",
                    $this->tablePlayers);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':tocken', $params['tocken'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(\Exception $e){
            
            return false;
        }
    }
}
