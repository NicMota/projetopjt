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
           return $this->db->select("users",["user","email"]);
    }
    public function findUserByUsername($username) 
    {
        
        $res = $this->db->select("users","*","user='".$username."'");
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
          
            if($password == $userArray["pass"])
            {
                session_start();
                $_SESSION["user"] = $userArray["user"];     
                          
                return true;
            }
        }
        else
        {
            return false;
        }
       
    }
}
$u = new User();
try {
    $u->findUserByUsername("dsa");
} catch (PDOException $err) {
    echo $err->getMessage();
}
