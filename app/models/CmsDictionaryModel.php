<?php

class CmsDictionaryModel extends Model
{
    private $tableTranslation = 'translation';
    private $tableLanguage = 'language';
    private $tableLanguageTranslation = 'language_translation';
    
    
    public function findAll()
    {
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `created` DESC", $this->tableTranslation);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function find($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableTranslation);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $object = $stmt->fetch();
            
            
            //Get languages translations
            $language = array();
            $query = sprintf("SELECT `l`.`iso_code`, `lt`.* FROM %s AS `l` 
                                INNER JOIN %s AS `lt` ON `l`.`id`=`lt`.`language_id` 
                                WHERE `lt`.`translation_id`=:translationId", $this->tableLanguage, $this->tableLanguageTranslation);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':translationId', $id, PDO::PARAM_INT);
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
    
    
    
    public function update($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `name`=:name, `description`=:description WHERE `id`=:id", $this->tableTranslation);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $params['description'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            if(!empty($params['lang'])){
                foreach($params['lang'] as $k=>$v){
                    //Get language_id
                    $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                    $stmt = $this->dbh->prepare($query);
                    $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                    $stmt->execute();
                    $response = $stmt->fetch();
                    
                    $query = sprintf("UPDATE %s SET `text`=:text WHERE `language_id`=:languageId AND `translation_id`=:translationId", $this->tableLanguageTranslation);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':text', $v['text'], PDO::PARAM_STR);
                    $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':translationId', $params['id'], PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function create($params)
    {
        
        try{
            //Check if there is already key in use
            $query = sprintf("SELECT * FROM %s WHERE `name`=:name", $this->tableTranslation);
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->fetch()){
                //Key in use
                return false;
            }
            
            $query = sprintf("INSERT INTO %s SET `name`=:name, `description`=:description", $this->tableTranslation);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $params['description'], PDO::PARAM_STR);
            $stmt->execute();
            
            $translationId = $this->dbh->lastInsertId();
            
            if(!empty($params['lang'])){
                foreach($params['lang'] as $k=>$v){
                    //Get language_id
                    $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
                    $stmt = $this->dbh->prepare($query);
                    $stmt->bindParam(':isoCode', $k, PDO::PARAM_STR);
                    $stmt->execute();
                    $response = $stmt->fetch();
                    
                    $query = sprintf("INSERT INTO %s SET `language_id`=:languageId, `translation_id`=:translationId, `text`=:text", $this->tableLanguageTranslation);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':translationId', $translationId, PDO::PARAM_INT);
                    $stmt->bindParam(':text', $v['text'], PDO::PARAM_STR);
                    $stmt->execute();
                }
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function delete($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableTranslation);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            $query = sprintf("DELETE FROM %s WHERE `translation_id`=:translationId", $this->tableLanguageTranslation);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':translationId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}
