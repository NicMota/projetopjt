<?php
    include_once 'inc/header_inc.php';
?>
<?php
    require_once '../controllers/PasswordController.php';
    $passwordController = new PasswordController();
?>
<body>
    
    <div class="form-card">
        <form method="post">
            <label for="">
                New Password:
            </label>
            <input type="password" name="newPassword" id="">

            <label for="">
                Confirm New Password:
            </label>
            <input type="password" name="confirmNewPassword" id="">
            <button type='submit' name='submit'>confirm</button>
        </form>


    </div>

   
</body>
<?php
    if(isset($_POST['submit']))
    {   
        
        $token = $_GET['token'];
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];
        if($newPassword == $confirmNewPassword)
        {
            $passwordController->changePassword($token,$newPassword);
        }
    }
?>