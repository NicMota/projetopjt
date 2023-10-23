<?php
include_once '../models/User.php';
class UserController
{
    private User $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function index() : array
    {
        try {
            $res = $this->userModel->getUsers();  
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
    public function editUser($id,$newUser,$newName,$newRole) : bool
    {   
        
        try {
            if($this->userModel->edit($id,$newUser,$newName,$newRole))
            {   
                
                header("Refresh: 1");
                return true;
            }else
            {
                return false;
            };
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
    public function register($user,$name,$email,$phone,$pass) : bool
    {   

        try
        {
            $res = $this->userModel->createUser($user,$name,$email,$phone,$pass,0);
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
        if($this->userModel->login($username,$password))
        {
            header('Location: ./index.php');
        }
        else
        {
            echo "Credentials Not Match With Any Register in The System";
        }
        
    }
    public function findUserById(int $id) : array
    {
        return $this->userModel->findUserById($id);
    }
    public function logout()
    {
        session_destroy();
        header("Location: ./index.php");
    }
}

