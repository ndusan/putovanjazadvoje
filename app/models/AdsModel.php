<?php

class AdsModel extends Model
{
    
    private $type = 'termsandconditions';
    
    private $tableAds = 'ads';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    private $tableLanguage = 'language';

    public function getTermsAndConditions($params)
    {
        try{
            
            $query = sprintf("SELECT `s`.*, `sl`.`text` FROM %s AS `s` 
                                LEFT JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id`
                                LEFT JOIN %s AS `l` ON `l`.`id`=`sl`.`language_id`
                                WHERE `s`.`type`=:type AND `l`.`iso_code`=:isoCode", $this->tableStatic, $this->tableStaticLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getPriceList($params)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableAds);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
}