<?php
    include_once 'inc/header_inc.php';
?>


    <div class="cart form-card">
        <form action="" method="post">
            
        <?php

        $subtotal = 0.00;
        if(isset($_SESSION['cart']))
        {
            $in_cart_array = $_SESSION['cart'];
       
            $events_id = array_keys($in_cart_array);
            
            $tickets = $eventController->getEventsInCart($events_id);
           
          
            foreach($tickets as $ticket):    
            $amount = $_SESSION['cart'][$ticket['id']];
            
        ?>
            <div class="ticket">
                   
                <h1><?=$ticket['name'];?></h1>            
                <h1><?= $ticket['desc'] ?></h1>
                <input type='number' name='amount[]' value='<?= $amount?>' max='<?=$amount?>'/>


                <input type="hidden" name="event_id[]" value='<?=$ticket['id']?>'/>
                
                
                
    
            </div>
           
        <?php
            //$subtotal += (float)$_SESSION['cart'][$ticket['id']]*$ticket['price'];
            endforeach;
        }
        ?>

        <h1>price: <?= $subtotal?></h1>
        
        
         
            
            <button type="submit" name='submit'>buy</button>
        
        </form>
    </div>


<?php 
    if(isset($_POST['submit']))
    {
        if(isset($_SESSION['id']))
        {   
            $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            var_dump($data);
            $user_id = $_SESSION['id'];
            
            $ticketController->buyTickets($data['event_id'],$user_id,$data['amount']);
            
            header('Location: cart.php');
        }
      
    }
?>
<?php
    include_once 'inc/footer_inc.php';
?>

