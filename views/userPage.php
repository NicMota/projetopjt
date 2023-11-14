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
                <h1>
                    <?=$user['user'];?>
                </h1>
            </div>
        </div>
       
    </div>
    <div class="middle-content">
        <div class='user-tickets'>
            <h1>SEUS INGRESSOS</h1>
            <?php
                foreach($tickets as $ticket):
                $event = $ticketController->getEventById($ticket['event_id']);
            ?>    
                <div class="user-ticket">
                    <h1><?=$event['name'];?></h1>
                    <h1>x<?=$ticket['amount'];?></h1>   
                    <p><?=$event['date']?></p>
                </div>
                    
            <?php
                endforeach;
            ?>
        </div>
    </div>

<?php 
        include './inc/footer_inc.php';
?>