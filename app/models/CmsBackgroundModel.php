<?php

class CmsBackgroundModel extends Model
{

    private $tableBackground= 'background';
    
    
    public function findAll()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function find($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function update($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `link`=:link WHERE `id`=:id", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function create($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `link`=:link", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->execute();
            
            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function delete($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
    
    
    public function setActive($id, $active)
    {
        
        try{
            //Set all to not active
            $query = sprintf("UPDATE %s SET `active`=:active", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);
            
            $all = 0;
            $stmt->bindParam(':active', $all, PDO::PARAM_INT);
            $stmt->execute();
            
            $query = sprintf("UPDATE %s SET `active`=:active WHERE `id`=:id", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':active', $active, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}