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
      return $this->collectionModel->addItem($name,$author,$imageName);
      
    }
    public function delete($id)
    {
        return $this->collectionModel->delete($id);
    }
    public function getItemById($id)
    {
        return $this->collectionModel->findItemById($id);
    }
    public function editItem($data)
    {
        return $this->collectionModel->edit($data);
    }
}