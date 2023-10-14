<?php
include_once '../controllers/UserController.php';
$userController = new UserController();

?>
<?php
    include_once 'inc/header_inc.php';
?>
<body>
    <div class="form-card">

        <form action="" method="post">
            <label for="">username:</label>
            <input type="text" name="user" id="" placeholder="username">
            <label for="">pass:</label>
            <input type="password" name='pass' id='' placeholder='password'>
            <button type="submit" name='submit'>loggin</button>
            <a href="register.php">Don't Have an Account? Click Here</a>
            <a href="forgotPassword.php">Forgot your Password?</a>
        </form>
    
    </div>
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