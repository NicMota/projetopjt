<?php
    include_once '../controllers/UserController.php';
    $userController = new UserController();

    $users = $userController->index();
  
    
?>

<?php
    include_once 'inc/header_inc.php';
?>
<body>
        <table>
            <tr>
                <th>
                    <h1>user:</h1>
                    <hr>
                  
                </th>
                <th>
                    <h1>email:</h1>   
                    <hr>
                </th>
                
            </tr>
            
            <?php 
            
                foreach($users as $u)
                {
                    echo '<tr>
                                <td> '.$u['user'].' </td> 
                                <td>'.$u['email'].' </td> 
                                <td><button><a href="edit.php?id='.$u['id'].'">edit <a></button> <button id="deleteButton" > delete </button> </td> 
                          </tr>';
                }
            ?>
        </table>

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
</body>
</html>