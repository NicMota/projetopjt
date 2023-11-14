<?php
require_once '../models/lib/Database.php';  
class Ticket
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getTickets()
    {
        return $this->db->select('tickets','*');
    }
  
    public function getEventById($event_id)
    {
        try {
            $stmt = $this->db->conn->prepare("SELECT events.*  FROM tickets JOIN events ON ? = events.id");
            $stmt->execute([$event_id]);

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            return false;
        }

    }
    public function getCartTickets($products_id)
    {   
        try {
            $array_to_question_marks = implode(',', array_fill(0, count($products_id), '?'));
            $stmt = $this->db->conn->prepare("SELECT * FROM tickets WHERE id IN(".$array_to_question_marks.");");
            
            $stmt->execute($products_id);
            $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $tickets;
        } catch (PDOException $e) {
            return false;
        }
        
    }
    public function createTickets($event_id, $user_id,$amount)
    {   
        
        try {
           
            foreach($event_id as $index => $id)
            {   
                $id = (int)$id;
              
                
                $stmt = $this->db->conn->prepare("INSERT INTO tickets(`event_id`, `user_id`, `amount`) VALUES (?,?,?);");
                $stmt->execute([$id,$user_id,$amount[$index]]);
                
                
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }finally {      
            unset($_SESSION['cart']);
        }
    }
    public function getTicketsByUserId($user_id)
    {
        try {
            $stmt = $this->db->conn->prepare('SELECT * FROM tickets WHERE user_id=?');
            $stmt->execute([$user_id]);

            $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $tickets;
        } catch (PDOException $e) {
           
        }
    }
    public function getAmountWithEventId($event_id)
    {
        try {
           $stmt = $this->db->conn->prepare("SELECT SUM(amount) as amount FROM tickets WHERE `event_id`= ?;");
           $stmt->execute([$event_id]);
           $res = $stmt->fetch(PDO::FETCH_ASSOC);
           return $res["amount"];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}