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
    public function addToCart($product_id, $quantity)
    {
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                
                if (array_key_exists($product_id, $_SESSION['cart'])) 
                {   
                    var_dump($_SESSION['cart'][$product_id]);
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                $_SESSION['cart'] = array($product_id => $quantity);
            }
    }
    public function getEventById($event_id)
    {
        return $this->ticketModel->getEventById($event_id);
    }
    public function getRemaining($event_id)
    {
        return $this->ticketModel->getAmountWithEventId($event_id);
    }
    public function getCartTickets($ticketsId)
    {
        return $this->ticketModel->getCartTickets($ticketsId);
    }
    public function getUserTickets($user_id)
    {
        return $this->ticketModel->getTicketsByUserId($user_id);
    }
    public function buyTickets($events_id,$user_id,$amounts)
    {
        return $this->ticketModel->createTickets($events_id,$user_id,$amounts);
    }
       
}