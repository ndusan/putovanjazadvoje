<?php

class CmsMagazineModel extends Model
{
    private $tableMagazine = 'magazine';
    private $tableMagazineLanguage = 'magazine_language';
    private $tableLanguage = 'language';
    
    
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
    
}