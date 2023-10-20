<?php 
include_once '../models/Collection.php';
class CollectionController
{
    private Collection $collectionModel;
    public function __construct()
    {
        $this->collectionModel = new Collection();
    }
    public function index()
    {
        
    }
    public function addItem($name,$author,$imagePath)
    {
        //$this->collectionModel->addItem($name,$author,$imagePath);
    }
}