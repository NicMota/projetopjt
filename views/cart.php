<?php
    include_once 'inc/header_inc.php';
?>
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

<div class="middle-content">
    
        <div class="cart">
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
                $price = number_format($ticket['price']*$amount,2,'.');
                $subtotal+=$price;
            ?>
                <div class="ticket">
                    
                    <h1><?=$ticket['name'];?></h1>            
                    <p><?= $ticket['desc']; ?></p>
                    
                    <select type="number" name='amount[]'>
                            <?php
                            for($i = 0; $i<=$amount;$i++):
                            ?>
                                <option value='<?=$i?>' selected> 
                                    <?=$i?>
                                </option>
                            <?php
                            endfor;
                            ?>
                    </select>
                <h3>R$<?=$price?></h3>
                


                    <input type="hidden" name="event_id[]" value='<?=$ticket['id']?>'/>
                    
                    
                    
        
                </div>
            
            <?php
            
                endforeach;
            }
            ?>

            
            
            <h3>TOTAL:R$<?=number_format($subtotal,2,'.')?></h3>
            
        
            <div class="cart-link">
                    <button name='submit' type='submit'>comprar </button>
                </div>
            
            </form>
        </div>
 

</div>
    



<?php
    include_once 'inc/footer_inc.php';
?>

