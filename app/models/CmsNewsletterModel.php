<?php

class CmsNewsletterModel extends Model 
{
    private $tableNewsletter = 'newsletter';
    
    public function findAllSubscribers()
    {
        try {
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC", $this->tableNewsletter);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            
            return false;
        }   
    }
    
    public function deleteSubscribed($id)
    {
        try {
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableNewsletter);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            
            return false;
        } 
    }
    
}