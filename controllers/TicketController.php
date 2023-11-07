<?php
require_once '../models/Ticket.php';
class TicketController
{
    private Ticket $ticketModel;

    public function __construct()
    {
        $this->ticketModel = new Ticket();
    }

    public function index()
    {
        return $this->ticketModel->getTickets();
    }
}