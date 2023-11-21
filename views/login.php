
<?php
    include_once 'inc/header_inc.php';

    
?>

    <div class="form-card">

        <form action="" method="post">
            <label for="">usuario:</label>
            <input type="text" name="user" id="" placeholder="usuario">
            <label for="">senha:</label>
            <input type="password" name='pass' id='' placeholder='senha'>
            <button type="submit" name='submit'>loggin</button>
            <a href="register.php">Não tem uma conta? Clique aqui!</a>
            <a href="forgotPassword.php">Esqueceu sua senha?</a>
        </form>
    
    </div>

<?php 
        include_once './inc/footer_inc.php';
?>

<?php

    if(isset($_POST['submit']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $userController->login($user,$pass);

        
    }
?>