<?php

class CmsAdsModel extends Model
{
    private $type = 'termsandconditions';
    
    private $tableLanguage = 'language';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    
    public function findTermsAndConditions()
    {
        
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();
            $response = $stmt->fetchAll();
            
            if(empty($response)) return false;
            
            $output = array();
            foreach($response as $r){
                
                $query = sprintf("SELECT `s`.*, `sl`.`text` FROM %s AS `s` 
                                    LEFT JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id`
                                    WHERE `s`.`type`=:type AND `sl`.`language_id`=:languageId", $this->tableStatic, $this->tableStaticLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->execute();
                
                $result = $stmt->fetchAll();
                
                if(!empty($result)){
                    foreach($result as $res){
                        
                        $output[$r['iso_code']] = $res;
                    }
                }
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function submitTermsAndConditions($params)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();
            $response = $stmt->fetchAll();
            
            
            if(empty($response)) return false;
            
            foreach($response as $r){
                
                //Check if exists
                $query = sprintf("SELECT `s`.* FROM %s AS `s` 
                                    INNER JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id` 
                                    WHERE `sl`.`language_id`=:languageId AND `s`.`type`=:type", $this->tableStatic, $this->tableStaticLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
                $stmt->execute();
                
                $result = $stmt->fetch();
                
                if(!empty($result)){
                    //UPDATE
                    
                    $query = sprintf("UPDATE %s SET `text`=:text WHERE `language_id`=:languageId AND `static_id`=:staticId", $this->tableStaticLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':text', $params[$r['iso_code']]['text'], PDO::PARAM_STR);
                    $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':staticId', $result['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    
                }else{
                    //INSERT
                    
                    //Check if it's second
                    $query = sprintf("SELECT `id` FROM %s WHERE `type`=:type", $this->tableStatic);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
                    $stmt->execute();
                    
                    $static = $stmt->fetch();
                    
                    if(empty($static)){
                        
                        $query = sprintf("INSERT INTO %s SET `type`=:type", $this->tableStatic);
                        $stmt = $this->dbh->prepare($query);

                        $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
                        $stmt->execute();

                        $staticId = $this->dbh->lastInsertId();
                    }else{
                        
                        $staticId = $static['id'];
                    }
                
                    $query = sprintf("INSERT INTO %s SET `language_id`=:languageId, `static_id`=:staticId, `text`=:text", $this->tableStaticLanguage);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':staticId', $staticId, PDO::PARAM_INT);
                    $stmt->bindParam(':text', $params[$r['iso_code']]['text'], PDO::PARAM_STR);
                    $stmt->execute();
                }
                
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}