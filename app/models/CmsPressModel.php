<?php

class CmsPressModel extends Model
{

    private $type = 'aboutmagazine';
    
    private $tableLanguage = 'language';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableFiles = 'files';
    private $tablePress = 'press';
    
    public function findMagazine()
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
    
    
    
    public function submitMagazine($params)
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

    public function updateFileInfo($fileName, $info=array())
    {
        try{
         
            $query = sprintf("UPDATE %s SET `size`=:size, `type`=:type, `alias_name`=:aliasName WHERE `file_name`=:fileName", $this->tableFiles);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':size', $info['size'], PDO::PARAM_INT);
            $stmt->bindParam(':type', $info['type'], PDO::PARAM_STR);
            $stmt->bindParam(':aliasName', $info['alias'], PDO::PARAM_STR);
            $stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function addFiles($fileName, $type)
    {
        try{
            //Find type id
            $query = sprintf("SELECT `id` FROM %s WHERE `type`=:type", $this->tableStatic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch();

            //Insert into files table
            $query = sprintf("INSERT INTO %s SET `file_name`=:fileName, `static_id`=:staticId", $this->tableFiles);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR);
            $stmt->bindParam(':staticId', $result['id'], PDO::PARAM_INT);
            $stmt->execute();
        }catch(Exception $e){
            
            return false;
        }
        
    }
    
    public function getFileName($id, $type)
    {
        try{
            $query = sprintf("SELECT `f`.* FROM %s AS `f`
                                INNER JOIN %s AS `s` ON `s`.`id`=`f`.`static_id`
                                WHERE `s`.`type`=:type AND `f`.`id`=:id", $this->tableFiles, $this->tableStatic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function removeFile($id, $type)
    {
        try{
            //Find type id
            $query = sprintf("SELECT `id` FROM %s WHERE `type`=:type", $this->tableStatic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch();

            //Remove
            $query = sprintf("DELETE FROM %s WHERE `id`=:id AND `static_id`=:staticId", $this->tableFiles);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':staticId', $result['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findFiles($type)
    {
        
        try{
            $query = sprintf("SELECT `f`.* FROM %s AS `f`
                                INNER JOIN %s AS `s` ON `s`.`id`=`f`.`static_id`
                                WHERE `s`.`type`=:type", $this->tableFiles, $this->tableStatic);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
}