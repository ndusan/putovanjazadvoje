<?php

class CmsCarouselModel extends Model
{
    private $tableCarousel = 'carousel';
    private $tableLanguage = 'language';
    private $tableCarouselLanguage= 'carousel_language';
    
    
    public function findAllCarousel()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableCarousel);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findCarousel($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableCarousel);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $object = $stmt->fetch();
            
            
            //Get languages translations
            $language = array();
            $query = sprintf("SELECT `l`.`iso_code`, `cl`.* FROM %s AS `l` 
                                INNER JOIN %s AS `cl` ON `l`.`id`=`cl`.`language_id` 
                                WHERE `cl`.`carousel_id`=:carouselId", $this->tableLanguage, $this->tableCarouselLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':carouselId', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $collection = $stmt->fetchAll();
            
            if(!empty($collection)){
                foreach ($collection as $k=>$v){
                    $language[$v['iso_code']]['text'] = $v['text'];
                }
            }
            
            $object['lang'] = $language;
            
            return $object;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateCarousel($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `link`=:link WHERE `id`=:id", $this->tableCarousel);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            //Set language translation
            foreach($params['content'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("UPDATE %s SET `text`=:text WHERE `carousel_id`=:carouselId AND `language_id`=:languageId",
                                $this->tableCarouselLanguage);
                
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':text', $v, PDO::PARAM_STR);
                $stmt->bindParam(':carouselId', $params['id'], PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function createCarousel($params)
    {
        
        try{
            $query = sprintf("INSERT INTO %s SET `link`=:link", $this->tableCarousel);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->execute();
            
            $carouselId = $this->dbh->lastInsertId();
            
            //Set language translation
            foreach($params['content'] as $k=>$v){
                //Get language_id
                $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                $stmt->execute();
                $response = $stmt->fetch();
                
                $query = sprintf("INSERT INTO %s SET `carousel_id`=:carouselId, `language_id`=:languageId, `text`=:text",
                                $this->tableCarouselLanguage);
                
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':carouselId', $carouselId, PDO::PARAM_INT);
                $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                $stmt->bindParam(':text', $v, PDO::PARAM_STR);
                $stmt->execute();
            }
            
            return $carouselId;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableCarousel);
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
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableCarousel);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function deleteCarousel($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableCarousel);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            $query = sprintf("DELETE FROM %s WHERE `carousel_id`=:carouselId", $this->tableCarouselLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':carouselId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();


            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
}