<?php

class CmsDownloadModel extends Model
{

    private $type_l = 'logo';
    
    private $tableLanguage = 'language';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableFiles = 'files';
    
    private $tableDownload = 'download';
    private $tableDownloadImage = 'download_image';
    
    public function findLogo()
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

                $stmt->bindParam(':type', $this->type_l, PDO::PARAM_STR);
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
    
    
    
    public function submitLogo($params)
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
                $stmt->bindParam(':type', $this->type_l, PDO::PARAM_STR);
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
                    
                    $stmt->bindParam(':type', $this->type_l, PDO::PARAM_STR);
                    $stmt->execute();
                    
                    $static = $stmt->fetch();
                    
                    if(empty($static)){
                        
                        $query = sprintf("INSERT INTO %s SET `type`=:type", $this->tableStatic);
                        $stmt = $this->dbh->prepare($query);

                        $stmt->bindParam(':type', $this->type_l, PDO::PARAM_STR);
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
         
            $query = sprintf("UPDATE %s SET `size`=:size, `type`=:type WHERE `file_name`=:fileName", $this->tableFiles);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':size', $info['size'], PDO::PARAM_INT);
            $stmt->bindParam(':type', $info['type'], PDO::PARAM_STR);
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
    
    
    
    
    public function createWallpaper($params)
    {
        try{
            $query = sprintf("INSERT INTO %s SET `created`=CURRENT_TIMESTAMP", $this->tableDownload);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();
            
            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName, $group)
    {
        try{
            $query = sprintf("INSERT INTO %s SET `image_name`=:imageName, `download_id`=:downloadId, `group`=:group", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':downloadId', $id, PDO::PARAM_INT);
            $stmt->bindParam(':group', $group, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function updateWallpaper($params)
    {
        //no action here
        return true;
    }
    
    
    public function getImageName($id, $group)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id AND `group`=:group", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':group', $group, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getImageNames($id)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `download_id`=:downloadId", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':downloadId', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findWallpaper($id)
    {
        $output = array();
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `download_id`=:downloadId", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':downloadId', $id, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll();
            
            if(!empty ($results)){
                foreach($results as $r){
                    
                    $output[$r['group']] = $r;
                }
            }
            
            $output['id'] = $id;
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findAllWallpapers()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableDownload);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function deleteWallpaper($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableDownload);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $query = sprintf("DELETE FROM %s  WHERE `downloadId`=:downloadId", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':downloadId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
    
    
    public function deleteWallpaperImage($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `download_id`=:downloadId AND `group`=:group", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':downloadId', $params['id'], PDO::PARAM_INT);
            $stmt->bindParam(':group', $params['group'], PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
    
    public function checkIfLastImage($params)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `download_id`=:downloadId", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':downloadId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch() ? true : false;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
}