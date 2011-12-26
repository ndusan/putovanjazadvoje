<?php

class CmsContestModel extends Model
{
    
    private $tableContest = 'contest';
    private $tableContestLanguage = 'contest_language';
    private $tableLanguge = 'language';
    
    
    public function getContest($id)
    {
        
        
    }
    
    
    public function submitInit($params)
    {
        
        try{
            if(!empty($params['id'])){
                //Update
                $query = sprintf("UPDATE %s SET `type`=:type, `magazine_id`=:magazineId WHERE `id`=:id", 
                                    $this->tableContest);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':type', $params['type'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['magazine'], PDO::PARAM_INT);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
                $stmt->execute();
                
                $id = $params['id'];
            }else{
                //Insert
                $query = sprintf("INSERT INTO %s SET `type`=:type, `magazine_id`=:magazineId", 
                                    $this->tableContest);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':type', $params['type'], PDO::PARAM_STR);
                $stmt->bindParam(':magazineId', $params['magazine'], PDO::PARAM_INT);
                $stmt->execute();
                
                $id = $this->dbh->lastInsertId();
            }
            
            //Set name and heading = per language
            $query = sprintf("UPDATE %s SET `title`=:title, `heading`=:heading WHERE `id`=:id", 
                                $this->tableContest);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':heading', $params['heading'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $id;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function submitConditions($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `type`=:type, `magazine_id`=:magazineId WHERE `id`=:id", 
                                $this->tableContest);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':type', $params['type'], PDO::PARAM_STR);
            $stmt->bindParam(':magazineId', $params['magazine'], PDO::PARAM_INT);
            $stmt->execute();

            return $params['id'];
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function submitDescription($params)
    {
        
        
    }
    
    public function submitPrizes($params)

    {
        
        
    }
}