<?php  
require_once '../models/Event.php';
class EventController
{
    private Event $eventModel;

    public function __construct()
    {
        $this->eventModel = new Event();
    }
    public function index()
    {
        return $this->eventModel->getAll();
    }
    public function getEventsInCart($events_id)
    {
        return $this->eventModel->getEventsbyId($events_id);
    }
    public function createEvent($data)
    {
        return $this->eventModel->createEvent($data);
    }
}