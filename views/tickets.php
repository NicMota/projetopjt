<?php
    include_once 'inc/header_inc.php';
?>
<?php 
    if(isset($_POST['submit']))
    {  
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $bought = false;
        foreach( $data['product_id' ] as $key => $product_id )
        {   
            $product_id = intval($product_id);
            $quantity = intval($data['product_qnt'][$key]);
            if($quantity>0)
            {
                $ticketController->addToCart($product_id,$quantity);
                $bought = true;
            }
        }
        if($bought)
        {
            header('Location: cart.php' );
        }
    }
?>
    <div class="padding-div">
    <div class="tickets">
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
                        <select type="number" name="product_qnt[]" >
                        <?php
                        for($i = 0; $i<=$disponible;$i++):
                        ?>
                            <option value='<?=$i?>'> 
                                <?=$i?>
                            </option>
                        <?php
                        endfor;
                        ?>
                        </select>

                        <h3>PREÇO:R$<?=$ticket['price'];?></h3>
                        <h3> DISPONIVEL:x<?=$disponible?></h3>
                    </div>
            <?php
                endif;
            endforeach;
            ?>
            <div class="cart-link">
                <button name='submit' type='submit'>comprar </button>
            </div>
        </form>
    </div>

    </div>
    
<?php
    include_once 'inc/footer_inc.php';
?>