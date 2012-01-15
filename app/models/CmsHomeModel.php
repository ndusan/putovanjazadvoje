<?php

class CmsHomeModel extends Model
{
    private $tableLanguage = 'language';
    
    public function isActive($isoCode)
    {
        try{
            $query = sprintf("SELECT `visible` FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':isoCode', $isoCode, PDO::PARAM_INT);
            $stmt->execute();

            $response = $stmt->fetch();
            
            return $response['visible'] ? true : false;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setLanguage($isoCode, $status=0)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `visible`=:status WHERE `iso_code`=:isoCode", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $s = !empty($status) ? 1 : 0;
            
            $stmt->bindParam(':isoCode', $isoCode, PDO::PARAM_STR);
            $stmt->bindParam(':status', $s, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}