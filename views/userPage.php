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
                <p>
                    User:<?=$user['user'];?>
                </p>
                <p>
                    Name:<?=$user['name'];?>
                </p>
                <p>
                    Phone:<?=$user['phone'];?>
                </p>
                <p>
                    <a href="">editar informações</a>
                </p>
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