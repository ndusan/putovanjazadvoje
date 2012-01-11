<?php

class CmsMagazineModel extends Model
{
    private $tableMagazine = 'magazine';
    private $tableMagazineLanguage = 'magazine_language';
    private $tableLanguage = 'language';
    private $tableTopic = 'topic';
    private $tableTopicLanguage = 'topic_language';
    
    public function getMagazines()
    {
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC", $this->tableMagazine);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getMagazine($params)
    {
        
        try{
            $output = array();
            
            //Id
            $output['id'] = $params['id'];
            
            //Index page
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableMagazine);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $output['index'] = $stmt->fetch();
            
            //Content & impressum page
            $query = sprintf("SELECT `ml`.*, `l`.`iso_code` FROM %s AS `ml`
                                INNER JOIN %s AS `l` ON `l`.`id`=`ml`.`language_id`", 
                            $this->tableMagazineLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $output['content'][$r['iso_code']] = $r['content'];
                    $output['impressum'][$r['iso_code']] = $r['impressum'];
                }
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function submitIndex($params)
    {
        try{
            //If id is set update
            if(!empty($params['id'])){
                //UPDATE
                $query = sprintf("UPDATE %s SET `number`=:number WHERE `id`=:id", $this->tableMagazine);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':number', $params['number'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
                $stmt->execute();
                
                $id = $params['id'];
            }else{
                //INSERT
                $query = sprintf("INSERT INTO %s SET `number`=:number", $this->tableMagazine);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':number', $params['number'], PDO::PARAM_STR);
                $stmt->execute();
                
                $id = $this->dbh->lastInsertId();
            }
            
            return $id;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function setIndexImage($id, $imageName, $field)
    {
        try{
            if($field == 'image_name'){
                $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id",
                                    $this->tableMagazine);
            }elseif($field == 'header_image_name'){
                $query = sprintf("UPDATE %s SET `header_image_name`=:imageName WHERE `id`=:id",
                                    $this->tableMagazine);
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
    
    
    public function submitContent($params)
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            foreach($response as $r){
                $query = sprintf("INSERT INTO %s SET `content`=:content, `magazine_id`=:magazineId, `language_id`=:languageId 
                                    ON DUPLICATE KEY UPDATE `content`=:content",
                                    $this->tableMagazineLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':content', $params['magazine'][$r['iso_code']]['content'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function submitImpressum($params)
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            foreach($response as $r){
                $query = sprintf("INSERT INTO %s SET `impressum`=:impressum, `magazine_id`=:magazineId, `language_id`=:languageId 
                                    ON DUPLICATE KEY UPDATE `impressum`=:impressum",
                                    $this->tableMagazineLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':impressum', $params['magazine'][$r['iso_code']]['impressum'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function topicForm($params)
    {
        
        try{
            $output = array();
            
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id AND `magazine_id`=:magazineId", $this->tableTopic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->bindParam(':magazineId', $params['magazine_id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $response = $stmt->fetch();
            $output['image_name'] = $response['image_name'];
            
            $query = sprintf("SELECT `tl`.*, `l`.`iso_code` FROM %s AS `tl`
                                INNER JOIN %s AS `l` ON `l`.`id`=`tl`.`language_id`
                                WHERE `tl`.`topic_id`=:id", $this->tableTopicLanguage, $this->tableLanguage);
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
    
    public function topicFormSubmit($params)
    {
        try{
            $query = sprintf("INSERT INTO `image_name`=:imageName, `magazine_id`=:magazineId", $this->tableTopicLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
        
    }
    
    public function topicFormDelete($params)
    {
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableTopic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $query = sprintf("DELETE FROM %s WHERE `topic_id`=:id", $this->tableTopicLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getAllTopicForms($params)
    {
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC", $this->tableTopic);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}