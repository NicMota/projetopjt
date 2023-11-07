<?php
include_once './inc/header_inc.php';

$collectionItems = $collectionController->index();
?>
<body>
    

    <div class="collection-grid">


<?php 
foreach ($collectionItems as $item) 
{
?>  
    
        <div class="collection-card">
            <img src="<?php echo './static/images/'.$item['imageName']; ?>">
        </div>



<?php 
}
?>
    </div>
</body>
<?php 
        include './inc/footer_inc.php';
?>