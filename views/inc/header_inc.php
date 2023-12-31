<?php
  
  session_start();
  
  require_once '../controllers/UserController.php';
  require_once '../controllers/PasswordController.php';
  require_once '../controllers/CollectionController.php';
  require_once '../controllers/CommentController.php';
  require_once '../controllers/TicketController.php';

  require_once '../controllers/EventController.php';
  $passwordController = new PasswordController();
  $userController = new UserController();
  $collectionController = new CollectionController();
  $commentController = new CommentController();
  $ticketController = new TicketController();
  $eventController = new EventController();

  if(isset($_GET['logout']))
  {
    $userController->logout();
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="./static/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./static/js/query.js"></script>
</head>

<?php 
  if(!isset($_SESSION['role'])) //WHAT THE NON-LOGGED SEE
  {
?>

  

    <nav class="navbar">
      <h1>
       Museu Paulo Agostinho Sobrinho
      </h1>
      <ul type='none'>
        
        <li class='link'>
          <a href="index.php">INICIO</a>
        </li>
        <li class='link'> 
          <a href="visit.php">VISITAR</a>
        </li>
        <li class='link'>
          <a href="whatson.php">NOVIDADES</a>
        </li>
        <li class='link'>
          <a href="login.php">LOGIN</a>
        </li>
        <li class='link'>
          <a href="register.php">REGISTRAR</a>
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
       Museu Paulo Agostinho Sobrinho
      </h1>
      <ul type='none'>
        <li class='link'>
          <a href="index.php">INICIO</a>
        </li>
        <li class='link'>
          <a href="visit.php">VISITAR</a>
        </li>
        <li class='link'> 
          <a href="whatson.php">NOVIDADES</a>
        </li>
        <li class='link'>
          <a href="tickets.php">INGRESSOS</a>
        </li>
        <li class='link'>
          <a href="userPage.php">ÁREA DO USUÁRIO</a>
        </li>
        <li class='link'>
          <a href="?logout">SAIR</a>
        </li>
        
      </ul>
    </nav>


    <?php  
          }else if($_SESSION['role'] == 1) //ADM'S NAV BAR
          {

          
    ?>
    <nav class="navbar">
      <h1>
       Museu Paulo Agostinho Sobrinho
      </h1>
      <ul type='none'>
          
        <li class='link'>
          <a href="index.php">INICIO</a>
        </li>
        <li class='link'>
          <a href="userPanel.php">PAINEL DO USUARIO</a>
        </li>
        <li class='link'> 
          <a href="collectionPanel.php">PAINEL DO ACERVO</a>
        </li>
        <li class='link'>
          <a href="eventPanel.php">PAINEL DE EVENTOS</a>
        </li>
        <li class='link'>
          <a href="userPage.php">ÁREA DO USUÁRIO</a>
        </li>
        <li class='link'>
          <a href="?logout">SAIR</a>
        </li>
        
      </ul>
    </nav>


<?php 
      }
  }


  
?>
<div class="content">
<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Você tem certeza que deseja deletar?<h2>
        
            <a class="red-button" id="saveChanges" >Deletar</a>
            <button class='yellow-button' id="closeModal">Cancelar </button>
        </div>
</div>