<?php
    include_once 'inc/header_inc.php';
?>


    
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


<?php 
        include './inc/footer_inc.php';
?>
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