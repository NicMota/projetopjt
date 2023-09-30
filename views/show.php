<?php
    include_once '../controllers/UserController.php';
    $userController = new UserController();

    $users = $userController->index();
  
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
                                <td> '.$u['user'].'</td> 
                                <td>'.$u['email'].'</td>   
                          </tr>';
                }
            ?>
        </table>
</body>
</html>