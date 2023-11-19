<?php
    include_once 'inc/header_inc.php';
    
     if(isset($_SESSION["role"])) {

        if($_SESSION["role"] != 1)
        { 
            http_response_code(403);
            exit;
        }  

     }else
     {    

        http_response_code(403);
        exit;

     }
     
     $users = $userController->index();
 ?>





    
     
        <div class="table-card">
            <table>
                <tr>
                    <th>
                        <h1>user:</h1>
                        
                    
                    </th>
                    <th>
                        <h1>email:</h1>   
                        
                   
                    <th>
                        <h1>role:</h1>   
                        
                    </th>
                    
                </tr>
                
                <?php 
                
                    foreach($users as $u)
                    {
                        if($u['admin'] == 0)
                        {
                            $role = 'user';
                        }else if($u['admin'] == 1)
                        {
                            $role = 'admin';
                        }
                ?>      
                       
                         <tr>
                            <td><?php echo $u['user'];?> </td> 
                            <td><?php echo $u['email'] ;?></td> 
                            <td><?php echo $role; ?></td>
                            <td><a href="userEdit.php?id=<?php echo $u['id'] ?>" class="yellow-button">edit</a> </td>
                            <td><button id="deleteButton" class="red-button openModal" data-value="<?php echo $u['id'];?>" >delete</button>  </td> 
                        </tr>
                    
                <?php  
                    }
                ?>
            </table>
        </div>
   
  

</html>


<?php
    if(isset($_GET['delete']))
    {   
        
        $id = intval($_GET['id']); 
        $userController->delete($id);

        header("Refresh: 0; url=./userPanel.php");

    }
?>
<?php 
        include './inc/footer_inc.php';
?>