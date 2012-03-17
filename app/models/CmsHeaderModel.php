<?php

class CmsHeaderModel extends Model
{

    private $tableHeader = 'header';
    
    public function findAllHeaders()
    {
        
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `id`", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(\PDOException $e){
            
            return false;
        }
    }
    
    public function findHeader($id)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(\PDOException $e){
            
            return false;
        }
    }
    
    public function setHeaderImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(\PDOException $e){
            
            return false;
        }
    }
    
    public function getHeaderImageName($id)
    {
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(\PDOException $e){
            
            return false;
        }
    }
    
    public function addHeader($params)
    {
        
        try{
            $query = sprintf("INSERT INTO %s SET `title`=:title, `link`=:link", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->execute();
            
            $lastId = $this->dbh->lastInsertId();
            
            //Update status
            $this->setVisible($lastId);
            
            return $lastId;
        }catch(\PDOException $e){
            
            return false;
        }
    }
   
    public function editHeader($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `title`=:title, `link`=:link WHERE `id`=:id", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(\PDOException $e){
            
            return false;
        }
    }
    
    public function deleteHeader($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function setVisible($id)
    {
        try{
            $query = sprintf("UPDATE %s SET `visible`='0'", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();
            
            $query = sprintf("UPDATE %s SET `visible`='1' WHERE `id`=:id", $this->tableHeader);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}