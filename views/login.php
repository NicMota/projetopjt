<?php
include_once '../controllers/UserController.php';
$userController = new UserController();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="user" id="" placeholder="username"><br>
        <input type="text" name='pass' id='' placeholder='password'><br>
        <button type="submit" name='submit'>loggin</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $userController->login($user,$pass);

        
    }
?>