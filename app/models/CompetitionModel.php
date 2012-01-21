<?php

class CompetitionModel extends Model
{
    private $tableLanguage = 'language';
    private $tableContest = 'contest';
    private $tableContestLanguage = 'contest_language';
    private $tableContestPrize = 'contest_prize';
    private $tableContestPrizeLanguage = 'contest_prize_language';
    
    public function getWinners($params)
    {
        try{
            $output = array();

            $query = sprintf("SELECT `c`.`id`, `c`.`image_name`, `cl`.`name`, `cl`.`description`
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
                    $query = sprintf("SELECT * FROM %s WHERE `contest_id`=:contestId ORDER BY `id` ASC", 
                                $this->tableContestPrize);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':contestId', $r['id'], PDO::PARAM_INT);
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
            
            $query = sprintf("SELECT `c`.`id`, `c`.`image_name`, `c`.`puzzle_image_name`, `c`.`winner_image_name`, 
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
    
    
    public function setPlayerInfo($userId, $params)
    {
        
        return true;
    }
}
