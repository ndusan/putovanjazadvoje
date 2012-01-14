<?php

class CmsContestModel extends Model
{
    
    private $tableContest = 'contest';
    private $tableContestLanguage = 'contest_language';
    private $tableLanguage = 'language';
    private $tableMagazine = 'magazine';
    
    public function getContests()
    {
        try{
            $query = sprintf("SELECT `c`.*, `cl`.`name` FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
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
                }
            }
            
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
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableContest);
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
}