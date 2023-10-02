<?php
include_once '../models/User.php';
class UserController
{
    private User $model;
    public function __construct()
    {
        $this->model = new User();
    }
    public function index() : array
    {
        try {
            $res = $this->model->getUsers();  
            if($res!=null)
            {      
                    return $res;
            }
            return [];
        } catch (PDOException $err) {
            echo $err->getMessage();
            return [];
        }
       
    }
     public function register($user,$name,$email,$phone,$pass) : bool
    {   

        try
        {
            $res = $this->model->createUser($user,$name,$email,$phone,$pass);
            if($res)
            {
                echo 'User Created Succesfully';
                return true;
            }
            else
            {
                echo 'Cannot create your user :C';
                return false;
            }
        }
        catch(PDOException $e)
        {
            echo 'Error '.$e->getMessage();
            return false;
        }
    }
    public function login($username,$password)
    {
        if($this->model->login($username,$password))
        {
            header('Location: ./loggedView.php');
        }
        else
        {

        }
        
    }
    public function findUserById(int $id) : array
    {
        return $this->model->findUserById($id);
    }
}

