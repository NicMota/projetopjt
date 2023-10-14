<?php 

include_once '../models/lib/Database.php';
class User 
{   
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUsers() : Array
    {   
           return $this->db->select("users",["id","user","email","admin"]);
    }
    public function findUserById(int $id)
    {
        $res = $this->db->select("users",["user","name","admin"],['id','=',$id]);
        if($res != [])
        {
            return $res[0];
        }else
        {
            return false;
        }
    }
    public function findUserByUsername($username) 
    {
        
        $res = $this->db->select("users","*",['user','=',$username]);
        if($res != [])
        {   
            if(count($res) == 1)
            {
                return $res[0];
            }
            else
            {
                Throw new Exception("more than one user with that name");
            }
        }else
        {
            return false;
        }
       
    }
    public function findUserByEmail($email) 
    {
        
        $res = $this->db->select("users","*",['email','=',$email]);
        if($res != [])
        {   
            if(count($res) == 1)
            {
                return $res[0];
            }
            else
            {
                Throw new Exception("more than one user with that email");
            }
        }else
        {
            return false;
        }
       
    }
    public function createUser($user,$name,$email,$phone,$pass) : bool
    {       
        if(!$this->findUserByUsername($user))
        {   
            $password = password_hash($pass,PASSWORD_BCRYPT);
            $res = $this->db->insert("users",["user","name","email","phone","pass"],[$user,$name,$email,$phone,$password]);
            if($res)
                return true;
            else
                return false;
        }else
        {   
            return false;
        }
       
    }
    public function login($username,$password)
    {
        if($this->findUserByUsername($username))
        {
            $userArray = $this->findUserByUsername($username);
          
            if(password_verify($password,$userArray["pass"]))
            {
                session_start();
                $_SESSION["user"] = $userArray["user"];     
                $_SESSION["role"] = $userArray["admin"];          
                return true;
            }
        }
        else
        {
            return false;
        }
       
    }
    public function edit($id,$newUser,$newName,$newRole) : bool
    {   
        if($this->db->update('users',['user','name','admin'],[$newUser,$newName,$newRole],['id','=',$id]))
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function changePassword($email,$newPassword)
    {   $newPassword = password_hash($newPassword,PASSWORD_BCRYPT);
        if($this->db->update('users',['pass'],[$newPassword],['email','=',$email]))
        {
            return true;
        }else
        {
            return false;
        }
    }
}

