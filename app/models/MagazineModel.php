<?php

class MagazineModel extends Model
{
    private $tableMagazine = 'magazine';
    private $tableMagazineLanguage = 'magazine_language';
    private $tableLanguage = 'language';
    private $tableTopic = 'topic';
    private $tableTopicLanguage = 'topic_language';
    
    public function getMagazine($params)
    {
        try{
            if(!empty($params['id'])){
                //Get selected one
                $query = sprintf("SELECT `m`.`id`, `m`.`number`, `m`.`image_name`, `m`.`header_image_name`, `m`.`word_image_name`,
                                        `ml`.`content`, `ml`.`impressum`, `ml`.`topic_title`, `ml`.`topic_content`, `ml`.`word`
                                    FROM %s AS `m`
                                    INNER JOIN %s AS `ml` ON `ml`.`magazine_id`=`m`.`id`
                                    INNER JOIN %s AS `l` ON `l`.`id`=`ml`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `m`.`id`=:id AND `m`.`visible`=1 ORDER BY `m`.`id` DESC LIMIT 0,1", 
                            $this->tableMagazine, $this->tableMagazineLanguage, $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
                $stmt->execute();
                
                return $stmt->fetch();
            }else{
                //Get lattest one
                $query = sprintf("SELECT `m`.`id`, `m`.`number`, `m`.`image_name`, `m`.`header_image_name`, `m`.`word_image_name`,
                                        `ml`.`content`, `ml`.`impressum`, `ml`.`topic_title`, `ml`.`topic_content`, `ml`.`word`
                                    FROM %s AS `m`
                                    INNER JOIN %s AS `ml` ON `ml`.`magazine_id`=`m`.`id`
                                    INNER JOIN %s AS `l` ON `l`.`id`=`ml`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `m`.`visible`=1 ORDER BY `m`.`id` DESC LIMIT 0,1", 
                            $this->tableMagazine, $this->tableMagazineLanguage, $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetch();
            }
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getTopic($params)
    {
        try{
            if(!empty($params['id'])){
                //Get selected one
                
            }else{
                //Get lattest one
                $query = sprintf("SELECT `t`.`id`, `t`.`image_name`,
                                        `tl`.`title`, `tl`.`content`
                                    FROM %s AS `t`
                                    INNER JOIN %s AS `tl` ON `tl`.`topic_id`=`t`.`id`
                                    INNER JOIN %s AS `l` ON `l`.`id`=`tl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `t`.`magazine_id`=:magazineId ORDER BY `t`.`id` DESC LIMIT 0,1", 
                            $this->tableTopic, $this->tableTopicLanguage, $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['magazine_id'], PDO::PARAM_INT);
                $stmt->execute();

                return $stmt->fetchAll();
            }
        }catch(Exception $e){
            
            return false;
        }
    }
    
}