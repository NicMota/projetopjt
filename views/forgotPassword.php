<?php
    include_once 'inc/header_inc.php';
?>

<body>
    <div class="form-card">

        <form action="" method="post" id='forgotPasswordForm'>
            <label for=""> Insert Your Email</label>
            <input type="text" name="email" id="" placeholder="Email">
            <button name='submit' type='submit'> send </button>
        </form>
    </div>

    
</body>
<?php
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $passwordController->sendTokenEmail($email);
    }
?>
