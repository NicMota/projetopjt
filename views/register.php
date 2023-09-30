<?php
    include_once '../controllers/UserController.php';
    $userController = new UserController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/style.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">

            <label for="username">username:</label>
            <input type="text" name="user" id=""><br>
            <label for="username">name:</label>
            <input type="text" name="name" id=""><br>
            <label for="username">email:</label>
            <input type="text" name="email" id=""><br>
            <label for="username">phone:</label>
            <input type="text" name="phone" id=""><br>
            <label for="password">password:</label>
            <input type="password" name="pass" id=""><br>
            <button type="submit" name="submit">send</button>

    </form>

</body>

</html>
<?php
    if(isset($_POST['submit']))
    {   
        $user = $_POST['user'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];

        
        $userController->register($user,$name,$email,$phone,$pass);
    }
?>