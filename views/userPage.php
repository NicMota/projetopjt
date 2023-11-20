<?php 
include_once("inc/header_inc.php");

?>
<?php 
$userId = $_SESSION['id'];
$user = $userController->findUserById($userId);
$tickets = $ticketController->getUserTickets($userId);
?>

    
    <div class="top-content">
        <div class="user">
            <div class="user-card">
                <div class="info">
                    <p>
                        Usuário:<?=$user['user'];?>
                    </p>
                    <p>
                        Nome:<?=$user['name'];?>
                    </p>
                    <p>
                        Telefone:<?=$user['phone'];?>
                    </p>
                    <p>
                        Email:<?=$user['email'];?>
                    </p>
                </div>
                <div class="links">
            
                    <a href="tickets.php" class='yellow-button'>comprar ingressos</a>

                    <a href="passwordEdit.php" class='yellow-button'>trocar senha</a>
             
                    <a href="edit.php?id=<?=$user['id']?>" class="yellow-button">editar informações</a>
              
                </div>
                
            </div>
        </div>
       
    </div>
    <div class="middle-content">
        <div class='user-tickets'>
            <h1>SEUS INGRESSOS</h1>
            <?php
                foreach($tickets as $ticket):
                    if($ticketController->getEventById($ticket['event_id'])):
                        $event = $ticketController->getEventById($ticket['event_id']);
                
            ?>    
                <div class="user-ticket">
                    <h1><?=$event['name'];?></h1>
                    <h1>x<?=$ticket['amount'];?></h1>   
                    <p><?=$event['date']?></p>
                </div>
                    
            <?php   
                    endif;
                endforeach;
            ?>
        </div>
    </div>
  

<?php 
        include './inc/footer_inc.php';
?>