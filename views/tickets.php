
<?php
    include_once 'inc/header_inc.php';
?>
<body>
    <div class="tickets">
        <?php 
        $tickets = $ticketController->index();
        foreach($tickets as $ticket):
        ?>
        <div class="ticket">
            <form action=""method='post'>
                <input type="hidden" name="product_id" value='<?=$ticket['id']?>'>
                <input type="number" name="product_qnt" >
                <button name='submit' type='submit'>comprar </button>
            </form>
            <h1 style='color:white'>AAAA AAAA AAAA</h1>
            <h1 style='color:white'><?=$ticket['date_added'];?></h1>
            
        </div>
        <?php
        endforeach;
        ?>
    </div>
</body>
<?php 
    if(isset($_POST['submit']))
    {   

        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['product_qnt'];

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
   
?>
<?php
    include_once 'inc/footer_inc.php';
?>