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
                                INNER JOIN %s AS `l` ON `l`.`id`=`ml`.`language_id`
                                WHERE `ml`.`magazine_id`=:magazineId", 
                            $this->tableMagazineLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $output['content'][$r['iso_code']] = $r['content'];
                    $output['impressum'][$r['iso_code']] = $r['impressum'];
                    $output['topic_title'][$r['iso_code']] = $r['topic_title'];
                    $output['topic_content'][$r['iso_code']] = $r['topic_content'];
                    $output['editorsword'][$r['iso_code']] = $r['word'];
                }
            }
            
            
            $query = sprintf("SELECT `t`.*, `tl`.`title` FROM %s AS `t` 
                                INNER JOIN %s AS `tl` ON `tl`.`topic_id`=`t`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`tl`.`language_id`
                                WHERE `l`.`is_default`=1 AND 
                                      `t`.`magazine_id`=:magazineId 
                                ORDER BY `t`.`id` DESC", 
                            $this->tableTopic, $this->tableTopicLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            $output['subtopic'] = $stmt->fetchAll();
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getMagazineImage($id)
    {
        try{
            $query = sprintf("SELECT `image_name`, `header_image_name`, `word_image_name` FROM %s WHERE `id`=:id", $this->tableMagazine);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
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
    
    public function setImage($id, $imageName, $field)
    {
        try{
            if($field == 'image_name'){
                $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id",
                                    $this->tableMagazine);
            }elseif($field == 'header_image_name'){
                $query = sprintf("UPDATE %s SET `header_image_name`=:imageName WHERE `id`=:id",
                                    $this->tableMagazine);
            }elseif($field == 'word_image_name'){
                $query = sprintf("UPDATE %s SET `word_image_name`=:imageName WHERE `id`=:id",
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
    
    
    public function submitTopic($params)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            foreach($response as $r){
                $query = sprintf("INSERT INTO %s SET `topic_title`=:topicTitle, `topic_content`=:topicContent, `magazine_id`=:magazineId, `language_id`=:languageId 
                                    ON DUPLICATE KEY UPDATE `topic_title`=:topicTitle, `topic_content`=:topicContent",
                                    $this->tableMagazineLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':topicTitle', $params['magazine'][$r['iso_code']]['topic_title'], PDO::PARAM_STR);
                $stmt->bindParam(':topicContent', $params['magazine'][$r['iso_code']]['topic_content'], PDO::PARAM_STR);
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
        if(empty($params['id']) || empty($params['magazine_id'])) return false;
        
        try{
            $output = array();
            
            $output['id'] = $params['id'];
            $output['magazine_id'] = $params['magazine_id'];
            
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
    
    public function topicFormSubmit($id, $magazineId, $params)
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
                                        WHERE `topic_id`=:topicId AND `language_id`=:languageId",
                                        $this->tableTopicLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':title', $params[$r['iso_code']]['title'], PDO::PARAM_STR);
                    $stmt->bindParam(':content', $params[$r['iso_code']]['content'], PDO::PARAM_STR);
                    $stmt->bindParam(':topicId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }
                
                return $id;
            }else{
                //INSERT
                $query = sprintf("INSERT INTO %s SET `magazine_id`=:magazineId", $this->tableTopic);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':magazineId', $magazineId, PDO::PARAM_INT);
                $stmt->execute();

                $latestId = $this->dbh->lastInsertId();
                
                $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();

                $response = $stmt->fetchAll();
                foreach($response as $r){
                    $query = sprintf("INSERT INTO %s SET `title`=:title, `content`=:content, `topic_id`=:topicId, `language_id`=:languageId",
                                        $this->tableTopicLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':title', $params[$r['iso_code']]['title'], PDO::PARAM_STR);
                    $stmt->bindParam(':content', $params[$r['iso_code']]['content'], PDO::PARAM_STR);
                    $stmt->bindParam(':topicId', $latestId, PDO::PARAM_INT);
                    $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }
                
                return $latestId;
            }
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
    
    public function topicFormGetImage($id)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableTopic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function topicFormSetImage($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableTopic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function submitWord($params)
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            foreach($response as $r){
                $query = sprintf("INSERT INTO %s SET `word`=:word, `magazine_id`=:magazineId, `language_id`=:languageId 
                                    ON DUPLICATE KEY UPDATE `word`=:word",
                                    $this->tableMagazineLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':word', $params['magazine'][$r['iso_code']]['editorsword'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return $params['id'];
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function setVisible($params)
    {
        try{
            $query = sprintf("UPDATE %s SET `visible`=:visible WHERE `id`=:id", $this->tableMagazine);
            $stmt = $this->dbh->prepare($query);

            $visible = 1 - $params['visible'];
            $stmt->bindParam(':visible', $visible, PDO::PARAM_INT);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function deleteMagazine($params)
    {
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableMagazine);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            $query = sprintf("DELETE FROM %s WHERE `magazine_id`=:magazineId", $this->tableMagazineLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            //Select topic if exist
            $query = sprintf("SELECT * FROM %s WHERE `magazine_id`=:magazineId", $this->tableTopic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $query = sprintf("DELETE FROM %s WHERE `topic_id`=:topicId", $this->tableTopicLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':topicId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }
            }

            $query = sprintf("DELETE FROM %s WHERE `magazine_id`=:magazineId", $this->tableTopic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':magazineId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getTopicImages($id){
        $query = sprintf("SELECT `image_name` FROM %s WHERE `magazine_id`=:magazineId", $this->tableTopic);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':magazineId', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    
}