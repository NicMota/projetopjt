
<?php
    include_once 'inc/header_inc.php';
?>

<body>
    <div class='form-card'>
        <form action="" method="POST" >

                <label for="username">username:</label>
                <input type="text" name="user" id="">
                
                <label for="username">name:</label>
                <input type="text" name="name" id="">

                <label for="username">email:</label>
                <input type="text" name="email" id="">

                <label for="username">phone:</label>
                <input type="text" name="phone" id="">

                <label for="password">password:</label>
                <input type="password" name="pass" id="">

                <button type="submit" name="submit">register</button>
                <a href="login.php"> Have an Account? Click Here</a>

        </form>
    </div>

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