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
        return $this->collectionModel->getItems();
    }
    public function addItem($name,$author,$imageName)
    {
      $this->collectionModel->addItem($name,$author,$imageName);
      
    }
}