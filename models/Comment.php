<?php
require_once '../models/lib/Database.php';
class Comment
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getComments()
    {
        $stmt = $this->db->conn->prepare('SELECT * FROM comments ORDER BY date_added DESC');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }
    public function createComment($comment,$userid)
    {
        $res = $this->db->insert('comments',['commentContent','user_id'],[$comment,$userid]);
        if($res)
            return true;
        else
            return false;
    }


}