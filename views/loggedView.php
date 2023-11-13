<?php
    include_once 'inc/header_inc.php';
?>
<?php
   
    if(!isset($_SESSION['user'])) {
       
        header("Location: ./register.php");
    }
?>


    <h1>
        YOU ARE LOGGED!!!
    </h1>

<?php 
        include './inc/footer_inc.php';
?>