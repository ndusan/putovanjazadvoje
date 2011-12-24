<?php

class DownloadModel extends Model
{
    
    private $type_l = 'logo';
    
    private $tableDownload = 'download';
    private $tableDownloadImage = 'download_image';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableLanguage = 'language';
    private $tableFiles = 'files';
    
    public function getLogo($params)
    {
        
        $output = array();
        
        try{
            
            $query = sprintf("SELECT `s`.*, `sl`.`text` FROM %s AS `s` 
                                LEFT JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id`
                                LEFT JOIN %s AS `l` ON `l`.`id`=`sl`.`language_id`
                                WHERE `s`.`type`=:type AND `l`.`iso_code`=:isoCode", $this->tableStatic, $this->tableStaticLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':type', $this->type_l, PDO::PARAM_STR);
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            $output = $stmt->fetch();
            
            //Get all files
            $query = sprintf("SELECT `f`.* FROM %s AS `f`
                                INNER JOIN %s AS `s` ON `s`.`id`=`f`.`static_id`
                                WHERE `s`.`type`=:type", $this->tableFiles, $this->tableStatic);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':type', $this->type_l, PDO::PARAM_STR);
            $stmt->execute();

            $output['files'] = $stmt->fetchAll();
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getWallpapers($params)
    {
        try{
            $output = array();
            
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC", $this->tableDownload);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            $results = $stmt->fetchAll();
            
            if(!empty($results)){
                foreach($results as $r){

                    $r['images'] = $this->getWallpaperImages($r['id']);
                    $output[] = $r;
                }
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
        
    }
    
    
    private function getWallpaperImages($id)
    {
        
        try{
            $output = array();
            
            $query = sprintf("SELECT * FROM %s WHERE `download_id`=:downloadId", $this->tableDownloadImage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':downloadId', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
}