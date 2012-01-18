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
    
    private $tableNews = 'news';
    private $tableNewsLanguage = 'news_language';
    
    private $tableMagazine = 'magazine';
    private $tableMagazineLanguage = 'magazine_language';

    private $tableTopic = 'topic';
    private $tableTopicLanguage = 'topic_language';
    
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
    
    
    public function searchFor($params)
    {
        $output = array();
        
        //Search via news for selected language
        $query = sprintf("SELECT `n`.`image_name` ,`nl`.* FROM %s AS `n`
                            INNER JOIN %s AS `nl` ON `nl`.`news_id`=`n`.`id`
                            INNER JOIN %s AS `l` ON `l`.`id`=`nl`.`language_id`
                            WHERE `l`.`iso_code`=:isoCode AND (`nl`.`title` LIKE :title OR `nl`.`heading` LIKE :heading OR `nl`.`text` LIKE :text)",
                            $this->tableNews, $this->tableNewsLanguage, $this->tableLanguage);
        $stmt = $this->dbh->prepare($query);
        
        $key = '%'.$params['q'].'%';
        
        $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
        $stmt->bindParam(':title', $key, PDO::PARAM_STR);
        $stmt->bindParam(':heading', $key, PDO::PARAM_STR);
        $stmt->bindParam(':text', $key, PDO::PARAM_STR);
        $stmt->execute();

        $output['news'] = $stmt->fetchAll();
        
        //Search via magazine for selected language
        $query = sprintf("SELECT `m`.`number`, `m`.`image_name` ,`ml`.* FROM %s AS `m`
                            INNER JOIN %s AS `ml` ON `ml`.`magazine_id`=`m`.`id`
                            INNER JOIN %s AS `l` ON `l`.`id`=`ml`.`language_id`
                            WHERE `l`.`iso_code`=:isoCode AND 
                            (`m`.`number` LIKE :number OR 
                             `ml`.`content` LIKE :content OR 
                             `ml`.`impressum` LIKE :impressum OR 
                             `ml`.`topic_title` LIKE :topicTitle OR 
                             `ml`.`topic_content` LIKE :topicContent OR 
                             `ml`.`topic_content_heading` LIKE :topicContentHeading OR 
                             `ml`.`word` LIKE :word OR 
                             `ml`.`word_heading` LIKE :wordHeading) AND `m`.`visible`=1",
                            $this->tableMagazine, $this->tableMagazineLanguage, $this->tableLanguage);
        $stmt = $this->dbh->prepare($query);
        
        $key = '%'.$params['q'].'%';
        
        $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
        $stmt->bindParam(':number', $key, PDO::PARAM_STR);
        $stmt->bindParam(':content', $key, PDO::PARAM_STR);
        $stmt->bindParam(':impressum', $key, PDO::PARAM_STR);
        $stmt->bindParam(':topicTitle', $key, PDO::PARAM_STR);
        $stmt->bindParam(':topicContent', $key, PDO::PARAM_STR);
        $stmt->bindParam(':topicContentHeading', $key, PDO::PARAM_STR);
        $stmt->bindParam(':word', $key, PDO::PARAM_STR);
        $stmt->bindParam(':wordHeading', $key, PDO::PARAM_STR);
        $stmt->execute();

        $output['magazine'] = $stmt->fetchAll();
        
        return $output;
    }
    
    
    public function getAllMagazine($params)
    {
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `id` ASC", $this->tableMagazine);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}