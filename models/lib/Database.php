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

    public function select($table,$rows = "*",$where = null) 
    {   
        $value = ':value';
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
            $query.=" WHERE ".$where[0]." ".$where[1]." :value ;" ;
        }
    
        try {
        $stmt = $this->conn->prepare($query);
        if($where !=null){
            if(gettype($where[2]) == 'string' )
                $stmt->bindParam(':value',$where[2],PDO::PARAM_STR);
            if(gettype($where[2]) == 'integer')
                $stmt->bindParam(':value',$where[2],PDO::PARAM_INT);
        }



       
            
      
            
            if($stmt->execute()){
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                return $res;
            }
            else
            {
                return [];
            }
        
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
       
    }
    public function update($table, $rows, $values,$where) 
    
    {
        $query = "UPDATE ".$table." SET ";
        foreach ($rows as $index => $r) {

            $count = count($rows);
            $value = $values[$index];
            if(gettype($value) == 'string')
                $value = "'".$value."'";
            
            
            $query .=$r."=".$value;
            if($index != $count-1)
                $query.=',';
        }
        $query.= " WHERE ".$where[0]." ".$where[1].":value;";
        echo $query;
        try {
            $stmt = $this->conn->prepare($query);
            if(gettype($where[2]) == 'string' )
                $stmt->bindParam(':value',$where[2],PDO::PARAM_STR);
            if(gettype($where[2]) == 'integer')
                $stmt->bindParam(':value',$where[2],PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }

}





