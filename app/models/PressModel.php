<?php

class PressModel extends Model
{
    
    private $type = 'aboutmagazine';
    
    private $tablePress = 'press';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableLanguage = 'language';
    private $tableFiles = 'files';
    
    public function getAboutMagaine($params)
    {
        $output = array();
        
        try{
            
            $query = sprintf("SELECT `s`.*, `sl`.`text` FROM %s AS `s` 
                                LEFT JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id`
                                LEFT JOIN %s AS `l` ON `l`.`id`=`sl`.`language_id`
                                WHERE `s`.`type`=:type AND `l`.`iso_code`=:isoCode", $this->tableStatic, $this->tableStaticLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            $output = $stmt->fetch();
            
            //Get all files
            $query = sprintf("SELECT `f`.* FROM %s AS `f`
                                INNER JOIN %s AS `s` ON `s`.`id`=`f`.`static_id`
                                WHERE `s`.`type`=:type", $this->tableFiles, $this->tableStatic);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
            $stmt->execute();

            $output['files'] = $stmt->fetchAll();
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
}