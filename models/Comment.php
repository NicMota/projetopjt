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
        return $this->db->select('comments',"*");
        
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