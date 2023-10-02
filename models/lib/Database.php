<?php 

class Database
{
    public Object $conn;

    public function __construct()
    {
        $this->setConnection();
    }

    public function setConnection() : bool
    {
        try
        {
            $this->conn = new PDO('mysql:host=localhost;dbname=pjt','root','');
                if($this->conn)
                    return true;
                else
                    return false;
        }catch(PDOException $err)
        {
            echo $err->getMessage();
            return false;
        }
    }
    public function insert($table,$columns,$values) : bool
    {
        $query  = "INSERT INTO ".$table;
        if($columns != null)
        {
            $query .= "(";
            $count = count($columns);
            foreach($columns as $index => $c)
            {
                $query.=$c;
                if($index !== $count-1)
                    $query.=",";
            }
            $query.=")";
        }
        $query .= " VALUES(";
        
        $count = count($values);
        foreach($values as $index => $v)
        {
            $query.= "'".$v."'";
            if($index !==$count-1)
                $query.=",";
        }
        $query.=");";

 
        $stmt = $this->conn->prepare($query);
        $res = $stmt->execute(); 
        
        return $res;
    }

    public function select($table,$rows = "*",$where = null) : Array
    {   
        $query = "SELECT ";
        if($rows != "*")
        {   
            $count = count($rows);
            
            foreach($rows as $index => $r)
            {
                $query.=$r;
                if($index !== $count-1)
                    $query.=",";
            }
        }
        else
        {
            $query.=$rows;
        }
        $query.= " FROM ".$table;
         
        
        if($where != null)
        {
            $query.=" WHERE ".$where;
        }

      
        $stmt = $this->conn->prepare($query);
        if($stmt->execute()){
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
            return $res;
        }
        else
        {
            return [];
        }
       
    }
}




