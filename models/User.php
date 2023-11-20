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
        $res = $this->db->select("users",'*',['id','=',$id]);
        #mudou o *
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
    public function createUser($user,$name,$email,$phone,$pass,$role) : bool
    {       
        if(!$this->findUserByUsername($user))
        {   
            try {
                $password = password_hash($pass,PASSWORD_BCRYPT);
                $stmt = $this->db->conn->prepare("INSERT INTO users(`user`,`name`,`email`,`phone`,`pass`,`admin`) VALUES (?,?,?,?,?,?)" );
           
                return $stmt->execute([$user,$name,$email,$phone,$password,"\x00"]);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        
           
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
                $_SESSION['id'] = $userArray['id'];
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
    public function editUser($data)
    {   
        try {
            $array_keys = array_keys($data);
            
            $data['id'] = (int)$data['id'];
           
            $query = "UPDATE users SET ";
            
            foreach($array_keys as $i =>$key)

            {   if($key!='id')
                {   
                    $query.='`'.$key.'`=? ';
                    if($i<count($array_keys)-2)
                        $query.=',';
                }
               
            }
            $query.=" WHERE `id`= ?;";
            
       
            $stmt = $this->db->conn->prepare($query);
            $values = array_values($data);
          
          
            return $stmt->execute($values);
          

        } catch (PDOException $e) {
            echo $e->getMessage();
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
    public function delete(int $id)
    {
        if($this->findUserById($id))
        {
            if($this->db->delete('users',['id','=',$id]))
            {   
                return true;
            }
            else
            {
                return false;
            }
        }else
        {
            return false;
        }
    }
}


