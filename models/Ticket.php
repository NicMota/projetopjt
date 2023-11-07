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
    public function createTicket()
    {

    }
}