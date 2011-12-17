<?php

class NewsModel extends Model
{
    private $tableNews = 'news';
    private $tableLanguage = 'language';
    private $tableNewsLanguage = 'news_language';
    
    public function getAllNews($params, $newsId=null)
    {
        
        try{
            if(null == $newsId){
                $query = sprintf("SELECT `n`.`id`, `n`.`image_name`, `n`.`created`, `nl`.`title`, `nl`.`heading`, `nl`.`text` FROM %s AS `n` 
                                    INNER JOIN %s AS `nl` ON `nl`.`news_id`=`n`.`id`
                                    INNER JOIN %s AS `l` ON `l`.`id`=`nl`.`language_id`
                                    WHERE `l`.`iso_code`=:isoCode 
                                    ORDER BY `n`.`id` DESC", 
                                    $this->tableNews, 
                                    $this->tableNewsLanguage, 
                                    $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
                $stmt->execute();
            }else{
                $query = sprintf("SELECT `n`.`id`, `n`.`image_name`, `n`.`created`, `nl`.`title`, `nl`.`heading`, `nl`.`text` FROM %s AS `n` 
                                    INNER JOIN %s AS `nl` ON `nl`.`news_id`=`n`.`id`
                                    INNER JOIN %s AS `l` ON `l`.`id`=`nl`.`language_id`
                                    WHERE `l`.`iso_code`=:isoCode AND `n`.`id`!=:newsId
                                    ORDER BY `n`.`id` DESC", 
                                    $this->tableNews, 
                                    $this->tableNewsLanguage, 
                                    $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
                $stmt->bindParam(':newsId', $params['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getSelectedNews($params)
    {
        try{
            $query = sprintf("SELECT `n`.`id`, `n`.`image_name`, `n`.`created`, `nl`.`title`, `nl`.`heading`, `nl`.`text` FROM %s AS `n` 
                                INNER JOIN %s AS `nl` ON `nl`.`news_id`=`n`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`nl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `n`.`id`=:newsId", 
                                $this->tableNews, 
                                $this->tableNewsLanguage, 
                                $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':newsId', $params['newsId'], PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
}