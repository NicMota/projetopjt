<?php
      include_once '../controllers/UserController.php';
      $userController = new UserController();
      $id = $_GET['id'];
      $user = $userController->findUserById($id);

?>
<?php
    include_once 'inc/header_inc.php';
?>
<body>
    <form action="" method="post">
    <?php
           echo' <label for="username">username:</label>
                <input type="text" name="user" id="" value="'.$user['user'].'"><br>
                
                <label for="username">name:</label>
                <input type="text" name="name" id="" value="'.$user['name'].'"><br>


                <button type="submit" name="submit">edit</button>'
    ?>

    </form>

<?php

?>
</body>
