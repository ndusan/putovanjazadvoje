<?php

class HomeModel extends Model
{
    
    private $tableCarousel = 'carousel';
    
    public function getCarouselCollection($params)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `position` DESC", $this->tableCarousel);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}