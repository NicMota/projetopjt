<?php 
include_once '../models/lib/Database.php';
class Collection 
{
    private Database $db;

    public function __construct()
    {
        $this->db =new Database();
    }

    public function getItems()
    {
       try {
            $stmt = $this->db->conn->prepare("SELECT * FROM collection;");   
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
       }
      
    }
    public function addItem($name,$author,$imagePath)
    {
        $res = $this->db->insert('collection',['name','author','imageName'],[$name,$author,$imagePath]);    
        if($res)
            return true;
        else 
            return false;   
    }
    public function delete($id)
    {
        try {
            $stmt = $this->db->conn->prepare("DELETE FROM collection WHERE id=?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}