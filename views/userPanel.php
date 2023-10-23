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





    <body>  
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
                        echo '<tr>
                                    <td> '.$u['user'].' </td> 
                                    <td>'.$u['email'].' </td> 
                                    <td>'.$role.'</td>
                                    <td><a href="edit.php?id='.$u['id'].'" class="yellow-button">edit</a> </td>
                                    <td><button id="deleteButton" class="red-button"> delete </button> </td> 
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </body>
    <script>
        const button = document.getElementById("deleteButton");
        button.onclick = ()=>
        {
            
            var res = confirm("Are You Sure You Want to Delete?");
            if(res)
            {
                
            }
            else
            {
                return;
            }
        }
        
    </script>

</html>