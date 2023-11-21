<?php
require_once '../models/lib/Database.php';
class Event
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAll()
    {
        try {
            return $this->db->select('events','*');
        } catch (PDOException$e) {
            return false;
        }
       
    }
    public function getEventsById($events_id)
    {
        try {
            
            $array_to_question_marks = implode(',', array_fill(0, count($events_id), '?'));
            $stmt = $this->db->conn->prepare("SELECT * FROM events WHERE id IN(".$array_to_question_marks.");");
            
            $stmt->execute($events_id);
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $events;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function createEvent($data)
    {
        try {
            $stmt = $this->db->conn->prepare("INSERT INTO events(`name`,`desc`,`date`,`tickets_amnt`,`price`) VALUES (?,?,?,?,?)");
            return $stmt->execute([$data['name'],$data['desc'],$data['date'],$data['tickets_amnt'],$data['price']]);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $stmt = $this->db->conn->prepare("DELETE FROM events WHERE id=?");
            return $stmt->execute([$id]);       
         } catch (PDOException $e) {
           echo $e->getMessage();
           return false;
        }
    }
    public function findEventById($id)
    {
        try {
            $stmt = $this->db->conn->prepare("SELECT * FROM events WHERE id=?");
            $stmt->execute([$id]);
           
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
   
    public function edit($data)
    { 
        try {
            $stmt = $this->db->conn->prepare("UPDATE events SET `name`=?,`desc`=?,`date`=?,`tickets_amnt`=?,`price`=? WHERE `id`=?");
            return $stmt->execute([$data['name'],$data['desc'],$data['date'],$data['tickets_amnt'],$data['price'],$data['id']]);

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}