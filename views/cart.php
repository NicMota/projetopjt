<?php
    include_once 'inc/header_inc.php';
?>

<body>
    <div class="cart">
        <?php
        var_dump($_SESSION['cart']);
        foreach($_SESSION['cart'] as $ticket):
        
        ?>
            <h1><?php $ticket[2]?></h1>
        <?php
        endforeach;
        ?>
    </div>
</body>

<?php
    include_once 'inc/footer_inc.php';
?>