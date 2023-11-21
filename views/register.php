
<?php
    include_once 'inc/header_inc.php';
?>


    <div class='form-card'>
        <form action="" method="POST" >

                <label for="username">usuario:</label>
                <input type="text" name="user" id="">
                
                <label for="username">nome:</label>
                <input type="text" name="name" id="">

                <label for="username">email:</label>
                <input type="text" name="email" id="">

                <label for="username">telefone:</label>
                <input type="text" name="phone" id="">

                <label for="password">senha:</label>
                <input type="password" name="pass" id="">

                <button type="submit" name="submit">registrar</button>
                <a href="login.php"> Tem uma conta? Clique aqui!</a>

        </form>
    </div>



<?php 
        include './inc/footer_inc.php';
?>
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
