
<?php
    include_once 'inc/header_inc.php';
?>

    <div class="tickets form-card">
        <form action=""method='post'>
            <?php 
            $events = $eventController->index();
            
            foreach($events as $ticket):
            $disponible = $ticket['tickets_amnt'] - $ticketController->getRemaining($ticket['id']);
           
                if($disponible > 0):
            ?>  

                    <div class="ticket">
                        <h1 ><?=$ticket['name']?></h1>
                        <input type="hidden" name="product_id[]" value='<?=$ticket['id']?>'/>
                        <input type="number" name="product_qnt[]" min='0' max='<?=$disponible;?>'/>
                        <h3> disponible:x<?=$disponible?></h3>
                    </div>
            <?php
                endif;
            endforeach;
            ?>
            <button name='submit' type='submit'>comprar </button>
        </form>
        <div class="cart-link">
            <a href="cart.php"> CART </a>
        </div>
    </div>
    

<?php 
    if(isset($_POST['submit']))
    {  
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        foreach( $data['product_id' ] as $key => $product_id )
        {   
            $product_id = intval($product_id);
            $quantity = intval($data['product_qnt'][$key]);
            if($quantity>0)
            {
                $ticketController->addToCart($product_id,$quantity);
            }      
        }
        header('Location: tickets.php' );
    }

   
   
?>
<?php
    include_once 'inc/footer_inc.php';
?>