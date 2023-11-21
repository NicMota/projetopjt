<?php require 'inc/header_inc.php';
?>
<?php
if(isset($_GET['id']))
{   
    $id = $_GET['id'];
    $e = $eventController->getEventById($id);
}



?>
<div class="top-content">
    <div class="title">
        <h1>
            <?=$e['name']?>
        </h1>
    </div>
    
</div>
<div class="middle-content">
    <div class="event-details">
    <div class="image-1">
        <img src="static/images/eventsIcons/evento<?=$id?>.jpg" alt="" srcset="">
    </div>
    <div class="desc">
        <?= $e['desc']; ?>
    </div>

    </div>
    
</div>
<div class="bottom-content">
    <div class="links">
        <a href="tickets.php" class='yellow-button'>comprar</a>
    </div>
</div>

<?php require 'inc/footer_inc.php';
?>
