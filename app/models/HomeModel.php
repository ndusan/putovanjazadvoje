<?php

class HomeModel extends Model
{
    
    private $tableCarousel = 'carousel';
    private $tableLanguage = 'language';
    private $tableCarouselLanguage = 'carousel_language';
    private $tableNews = 'news';
    private $tableNewsLanguage = 'news_language';
    private $tableMagazine = 'magazine';
    private $tableMagazineLanguage = 'magazine_language';
    private $tableNewsletter = 'newsletter';
    
    
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
        }catch(\PDOException $e){
            
            return false;
        }
    }
    
    
    public function getLatestNews($params, $startOfNews, $numOfNews)
    {
        
        try{
            $query = sprintf("SELECT `n`.`id`, `n`.`image_name`, `n`.`created`, `nl`.`title`, `nl`.`heading`, `nl`.`text` FROM %s AS `n` 
                                INNER JOIN %s AS `nl` ON `nl`.`news_id`=`n`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`nl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode 
                                ORDER BY `n`.`id` DESC LIMIT %d, %d", 
                                $this->tableNews, 
                                $this->tableNewsLanguage, 
                                $this->tableLanguage,
                                $startOfNews,
                                $numOfNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(\PDOException $e){
            
            return false;
        }
    }
    
    
    public function addNewsletter($email)
    {
        try {
            $query = sprintf("INSERT IGNORE INTO %s SET `email`=:email",
                                $this->tableNewsletter);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function removeNewsletter($email)
    {
        try {
            $query = sprintf("UPDATE %s SET `status`=:status WHERE `email`=:email",
                                $this->tableNewsletter);
            $stmt = $this->dbh->prepare($query);

            $status = 'inactive';
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
}