<?php

class HomeModel extends Model
{
    
    private $tableCarousel = 'carousel';
    private $tableLanguage = 'language';
    private $tableCarouselLanguage = 'carousel_language';
    
    public function getCarouselCollection($params)
    {
        
        try{
            $query = sprintf("SELECT `c`.*, `cl`.`text` FROM %s AS `c` 
                                INNER JOIN %s AS `cl` ON `cl`.`carousel_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode 
                                ORDER BY `c`.`id` DESC", 
                                $this->tableCarousel, 
                                $this->tableCarouselLanguage, 
                                $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}