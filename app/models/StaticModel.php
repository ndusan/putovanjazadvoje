<?php

class StaticModel extends Model
{
    
    const STATIC_ABOUTUS = 'aboutus';
    const STATIC_GIVEAWAY = 'giveaway';
    const STATIC_ORDERPREVIOUS = 'orderprevious';
    const STATIC_SIGNUPFORMAGAZINE = 'signupformagazine';
    const STATIC_ARCHIVE = 'archive';
    
    private $tableLanguage = 'language';
    private $tableStatic = 'static';
    private $tableStaticLanguage = 'static_language';
    
    private $types = array(0 => self::STATIC_ABOUTUS, 
                           1 => self::STATIC_GIVEAWAY, 
                           2 => self::STATIC_ORDERPREVIOUS, 
                           3 => self::STATIC_SIGNUPFORMAGAZINE,
                           4 => self::STATIC_ARCHIVE);
    
    
    public function find($params, $type)
    {
        
        if (!in_array($type, array(self::STATIC_ABOUTUS, self::STATIC_GIVEAWAY, self::STATIC_ORDERPREVIOUS, self::STATIC_SIGNUPFORMAGAZINE, self::STATIC_ARCHIVE))) {
            if (isset($this->types[$type])) {
                $this->type = $this->types[$type];
            } else {
                throw new \InvalidArgumentException('Wrong type');
            }
        }
        
        $this->type = $type;
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();
            
            $response = $stmt->fetch();
                
            $query = sprintf("SELECT `s`.*, `sl`.`text` FROM %s AS `s` 
                                LEFT JOIN %s AS `sl` ON `sl`.`static_id`=`s`.`id`
                                WHERE `s`.`type`=:type AND `sl`.`language_id`=:languageId", $this->tableStatic, $this->tableStaticLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
            $stmt->bindParam(':languageId', $response['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}