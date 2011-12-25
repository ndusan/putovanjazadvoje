<?php

class CmsNewsModel extends Model
{
    private $tableNews= 'news';
    private $tableLanguage= 'language';
    private $tableNewsLanguage= 'news_language';
    
    
    public function findAllNews()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findNews($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $object = $stmt->fetch();
            
            
            //Get languages translations
            $language = array();
            $query = sprintf("SELECT `l`.`iso_code`, `nl`.* FROM %s AS `l` 
                                INNER JOIN %s AS `nl` ON `l`.`id`=`nl`.`language_id` 
                                WHERE `nl`.`news_id`=:newsId", $this->tableLanguage, $this->tableNewsLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':newsId', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $collection = $stmt->fetchAll();
            
            if(!empty($collection)){
                foreach ($collection as $k=>$v){
                    $language[$v['iso_code']]['title'] = $v['title'];
                    $language[$v['iso_code']]['heading'] = $v['heading'];
                    $language[$v['iso_code']]['text'] = $v['text'];
                }
            }
            
            $object['lang'] = $language;
            
            return $object;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateNews($params)
    {
        
        try{
            //Set language translation
            foreach($params['content'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("UPDATE %s SET `title`=:title, `heading`=:heading, `text`=:text
                                    WHERE `news_id`=:newsId AND `language_id`=:languageId",
                                $this->tableNewsLanguage);
                
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':title', $params['title'][$k], PDO::PARAM_STR);
                $stmt->bindParam(':heading', $params['heading'][$k], PDO::PARAM_STR);
                $stmt->bindParam(':text', $v, PDO::PARAM_STR);
                $stmt->bindParam(':newsId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function createNews($params)
    {
        
        try{
            $query = sprintf("INSERT INTO %s SET `created`=CURRENT_TIMESTAMP", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();
            
            $newsId = $this->dbh->lastInsertId();
            
            //Set language translation
            foreach($params['title'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("INSERT INTO %s SET `news_id`=:newsId, `language_id`=:languageId, 
                                                     `title`=:title, `heading`=:heading, `text`=:text",
                                $this->tableNewsLanguage);
                
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':newsId', $newsId, PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->bindParam(':title', $v, PDO::PARAM_STR);
                $stmt->bindParam(':heading', $params['heading'][$k], PDO::PARAM_STR);
                $stmt->bindParam(':text', $params['content'][$k], PDO::PARAM_STR);
                $stmt->execute();
            }
            
            return $newsId;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function deleteNews($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            $query = sprintf("DELETE FROM %s WHERE `news_id`=:newsId", $this->tableNewsLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':newsId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
}