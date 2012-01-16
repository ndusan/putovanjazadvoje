<?php

class CompetitionModel extends Model
{
    private $tableLanguage = 'language';
    private $tableContest = 'contest';
    private $tableContestLanguage = 'contest_language';
    private $tableContestPrize = 'contest_prize';
    
    public function getWinners($params)
    {
        try{
            $output = array();

            $query = sprintf("SELECT `c`.`id`, `c`.`image_name`, `cl`.`name`, `cl`.`description`
                                FROM %s AS `c`
                                INNER JOIN %s AS `cl` ON `cl`.`contest_id`=`c`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`cl`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode AND `c`.`status`=:status 
                                ORDER BY `c`.`id` DESC", 
                        $this->tableContest, $this->tableContestLanguage, $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $status = 'finished';
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();
           
            $response = $stmt->fetchAll();
            
            if(!empty($response)){
                foreach($response as $r){
                    $query = sprintf("SELECT * FROM %s WHERE `contest_id`=:contestId ORDER BY `id` ASC", 
                                $this->tableContestPrize);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':contestId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    
                    $r['winners'] = $stmt->fetchAll();
                    $output[] = $r;
                }
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
}
