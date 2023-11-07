<?php
  
  session_start();
  
  require_once '../controllers/UserController.php';
  //require_once '../controllers/PasswordController.php';
  require_once '../controllers/CollectionController.php';
  require_once '../controllers/CommentController.php';
  //$passwordController = new PasswordController();
  $userController = new UserController();
  $collectionController = new CollectionController();
  $commentController = new CommentController();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./static/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php 
  if(!isset($_SESSION['role'])) //WHAT THE NON-LOGGED SEE
  {
?>
<nav class="navbar">
  <h1>
    Singed
  </h1>
  <ul type='none'>
    
    <li class='link'>
      <a href="index.php">HOME</a>
    </li>
    <li class='link'> 
      <a href="visit.php">VISIT</a>
    </li>
    <li class='link'>
      <a href="whatson.php">WHAT'S ON</a>
    </li>
    <li class='link'>
      <a href="login.php">SIGN IN</a>
    </li>
    <li class='link'>
      <a href="register.php">SIGN UP</a>
    </li>
  </ul>
</nav>
<?php 
  }else 
  {
      if($_SESSION['role'] == 0) //USER'S NAV BAR
      {
      
?>
<nav class="navbar">
  <h1>
    Singed
  </h1>
  <ul type='none'>
    <li class='link'>
      <a href="index.php">HOME</a>
    </li>
    <li class='link'>
      <a href="visit.php">VISIT</a>
    </li>
    <li class='link'> 
      <a href="whatson.php">WHAT'S ON</a>
    </li>
    <li class='link'>
      <a href="tickets.php">TICKETS</a>
    </li>
    <li class='link'>
      <a href="?logout">LOG OUT</a>
    </li>
  </ul>
</nav>


<?php  
      }else if($_SESSION['role'] == 1) //ADM'S NAV BAR
      {

      
?>
<nav class="navbar">
  <h1>
    Singed
  </h1>
  <ul type='none'>
      
    <li class='link'>
      <a href="index.php">HOME</a>
    </li>
    <li class='link'>
      <a href="userPanel.php">USER'S PANEL</a>
    </li>
    <li class='link'> 
      <a href="collectionPanel.php">COLLECTION PANEL</a>
    </li>
    <li class='link'>
      <a href="ticketsPanel.php">TICKETS PANEL</a>
    </li>
    <li class='link'>
      <a href="?logout">LOG OUT</a>
    </li>
  </ul>
</nav>


<?php 
      }
  }

  if(isset($_GET['logout']))
  {
    $userController->logout();
  }
  
?>