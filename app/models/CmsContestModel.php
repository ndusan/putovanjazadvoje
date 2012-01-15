<?php

class CmsContestModel extends Model
{
    
    private $tableContest = 'contest';
    private $tableContestLanguage = 'contest_language';
    private $tableLanguage = 'language';
    private $tableMagazine = 'magazine';
    private $tableContestPrize = 'contest_prize';
    private $tableContestPrizeLanguage = 'contest_prize_language';
    
    public function getContests()
    {
        try{
            $query = sprintf("SELECT `c`.*, `cl`.`name` FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`is_default`=1
                                ORDER BY `c`.`id` DESC", 
                                $this->tableContest, $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getContest($params)
    {
        $output = array();
        
        try{
            //Id
            $output['id'] = $params['id'];
            
            //Index page
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableContest);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $output['init'] = $stmt->fetch();
            
            $query = sprintf("SELECT `cl`.*, `l`.`iso_code` FROM %s AS `cl`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `cl`.`contest_id`=:contestId", 
                            $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $output['init']['name'][$r['iso_code']] = $r['name'];
                    $output['init']['content'][$r['iso_code']] = $r['content'];
                    $output['conditions'][$r['iso_code']] = $r['conditions'];
                    $output['description'][$r['iso_code']] = $r['description'];
                }
            }
            
            //Prizes
            $query = sprintf("SELECT `cp`.*, `cpl`.`title` FROM %s AS `cp` 
                                INNER JOIN %s AS `cpl` ON `cpl`.`contest_prize_id`=`cp`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cpl`.`language_id`
                                WHERE `l`.`is_default`=1 AND 
                                      `cp`.`contest_id`=:contestId 
                                ORDER BY `cp`.`id` DESC", 
                            $this->tableContestPrize, $this->tableContestPrizeLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            $output['prizes'] = $stmt->fetchAll();
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function submitInit($params)
    {
        
        try{
            if(!empty($params['id'])){
                //Update
                $query = sprintf("UPDATE %s SET `type`=:type, `magazine_id`=:magazineId WHERE `id`=:id", 
                                    $this->tableContest);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':type', $params['type'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['magazine'], PDO::PARAM_INT);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
                $stmt->execute();
                
                $id = $params['id'];
            }else{
                //Insert
                $query = sprintf("INSERT INTO %s SET `type`=:type, `magazine_id`=:magazineId", 
                                    $this->tableContest);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':type', $params['type'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['magazine'], PDO::PARAM_INT);
                $stmt->execute();
                
                $id = $this->dbh->lastInsertId();
            }
            
            //Get all languages 
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            foreach($response as $r){
                $query = sprintf("INSERT INTO %s SET `name`=:name, `content`=:content,
                                                     `contest_id`=:contestId, `language_id`=:languageId 
                                    ON DUPLICATE KEY UPDATE `name`=:name, `content`=:content",
                                    $this->tableContestLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':name', $params[$r['iso_code']]['name'], PDO::PARAM_STR);
                $stmt->bindParam(':content', $params[$r['iso_code']]['content'], PDO::PARAM_STR);
                $stmt->bindParam(':contestId', $id, PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->execute();
            }

            return $id;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function submitConditions($params)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            foreach($response as $r){
                $query = sprintf("INSERT INTO %s SET `conditions`=:conditions, `contest_id`=:contestId, `language_id`=:languageId 
                                    ON DUPLICATE KEY UPDATE `conditions`=:conditions",
                                    $this->tableContestLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->bindParam(':conditions', $params['contest'][$r['iso_code']]['conditions'], PDO::PARAM_STR);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function submitDescription($params)
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            foreach($response as $r){
                $query = sprintf("INSERT INTO %s SET `description`=:description, `contest_id`=:contestId, `language_id`=:languageId 
                                    ON DUPLICATE KEY UPDATE `description`=:description",
                                    $this->tableContestLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->bindParam(':description', $params['contest'][$r['iso_code']]['description'], PDO::PARAM_STR);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function submitPrizes($params)
    {
        
        
    }
    
    public function getAllMagazine()
    {
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `visible`='1' ORDER BY `id` DESC", 
                                $this->tableMagazine);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImages($id)
    {
        try{
            $query = sprintf("SELECT `image_name`, `puzzle_image_name` FROM %s WHERE `id`=:id", $this->tableContest);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function setImage($id, $imageName, $field)
    {
        try{
            if($field == 'image_name'){
                $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id",
                                    $this->tableContest);
            }elseif($field == 'puzzle_image_name'){
                $query = sprintf("UPDATE %s SET `puzzle_image_name`=:imageName WHERE `id`=:id",
                                    $this->tableContest);
            }
            
            $stmt = $this->dbh->prepare($query);
                
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function prizeForm($params)
    {
        if(empty($params['id']) || empty($params['contest_id'])) return false;
        
        try{
            $output = array();
            
            $output['id'] = $params['id'];
            $output['contest_id'] = $params['contest_id'];
            
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableContestPrize);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $response = $stmt->fetch();
            $output['prize_image_name'] = $response['image_name'];
            
            $query = sprintf("SELECT `cpl`.*, `l`.`iso_code` FROM %s AS `cpl`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cpl`.`language_id`
                                WHERE `cpl`.`contest_prize_id`=:id", 
                            $this->tableContestPrizeLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            if(!empty($response)){
                foreach($response as $r){
                    $output[$r['iso_code']] = $r;
                }
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function wizardPrizeFormSubmit($id, $contestId, $params)
    {
        try{
            if(!empty($id)){
                //UPDATE
                $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();

                $response = $stmt->fetchAll();
                foreach($response as $r){
                    $query = sprintf("UPDATE %s SET `title`=:title, `content`=:content 
                                        WHERE `contest_prize_id`=:contestPrizeId AND `language_id`=:languageId",
                                        $this->tableContestPrizeLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':title', $params[$r['iso_code']]['title'], PDO::PARAM_STR);
                    $stmt->bindParam(':content', $params[$r['iso_code']]['content'], PDO::PARAM_STR);
                    $stmt->bindParam(':contestPrizeId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }

                return $id;
            }else{
                //INSERT
                $query = sprintf("INSERT INTO %s SET `contest_id`=:contestId", $this->tableContestPrize);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':contestId', $contestId, PDO::PARAM_INT);
                $stmt->execute();

                $latestId = $this->dbh->lastInsertId();
                
                $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();

                $response = $stmt->fetchAll();
                foreach($response as $r){
                    $query = sprintf("INSERT INTO %s SET `title`=:title, `content`=:content, `contest_prize_id`=:contestPrizeId, `language_id`=:languageId",
                                        $this->tableContestPrizeLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':title', $params[$r['iso_code']]['title'], PDO::PARAM_STR);
                    $stmt->bindParam(':content', $params[$r['iso_code']]['content'], PDO::PARAM_STR);
                    $stmt->bindParam(':contestPrizeId', $latestId, PDO::PARAM_INT);
                    $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }
                
                return $latestId;
            }
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function wizardPrizeSetImage($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableContestPrize);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function wizardPriceFormGetImage($id)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableContestPrize);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function wizardPrizeFormDelete($params)
    {
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableContestPrize);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $query = sprintf("DELETE FROM %s WHERE `contest_prize_id`=:id", $this->tableContestPrizeLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setStatus($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `status`=:status WHERE `id`=:id", $this->tableContest);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':status', $params['status'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function deleteContest($params)
    {
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableContest);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            $query = sprintf("DELETE FROM %s WHERE `contest_id`=:contestId", $this->tableContestLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            //Select topic if exist
            $query = sprintf("SELECT * FROM %s WHERE `contest_id`=:contestId", $this->tableContestPrize);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $query = sprintf("DELETE FROM %s WHERE `contest_prize_id`=:contestPrizeId", $this->tableContestPrizeLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':contestPrizeId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }
            }

            $query = sprintf("DELETE FROM %s WHERE `contest_id`=:contestId", $this->tableContestPrize);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function wizardPriceFormGetImages($id)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `contest_id`=:contestId", $this->tableContestPrize);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':contestId', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getPrizes($params)
    {
        
        try{
            $query = sprintf("SELECT `cp`.*, `cpl`.`title`, `cpl`.`content` FROM %s AS `cp` 
                                INNER JOIN %s AS `cpl` ON `cpl`.`contest_prize_id`=`cp`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cpl`.`language_id`
                                WHERE `l`.`is_default`=1 AND 
                                      `cp`.`contest_id`=:contestId 
                                ORDER BY `cp`.`id` DESC", 
                            $this->tableContestPrize, $this->tableContestPrizeLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':contestId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setWinners($params)
    {
        try{
            if(!empty($params['winner'])){
                foreach($params['winner'] as $key=>$value){
                    $query = sprintf("UPDATE %s SET `winner`=:winner WHERE `id`=:id", $this->tableContestPrize);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':winner', $value, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $key, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}