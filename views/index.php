<?php 
    include_once 'inc/header_inc.php';
?>
<?php
    $collection = $collectionController->index();
?>


    <div class="content">

        <div class='top-content'>
            <div class="museum-img">
                <div class="links">
                    <a href="tickets.php" class='yellow-button'>COMPRAR INGRESSOS</a>
                    <a href="collection.php" class='yellow-button' >ACERVO</a>
                </div>
            </div>
            
            
        </div>
        <div class="middle-content">
            
            <div class="exhibition">
                <div class="exhibition-card"> 
                    <div class="exhibition-content">
                        <img src="./static/images/eventsIcons/evento10.jpg" alt="" srcset="">
                    </div>
                    <a href ='event.php?id=10'class='exhibition-button'>
                        VISITE
                    </a>
                </div>
                <div class="exhibition-card">   
                    <div class="exhibition-content">
                        <img src="./static/images/eventsIcons/evento11.jpg" alt="" srcset="">
                    </div>
                    <a href='event.php?id=11'class='exhibition-button'>
                        VISITE
                    </a>
                </div>
                <div class="exhibition-card">   
                    <div class="exhibition-content">
                        <img src="./static/images/eventsIcons/evento12.jpg" alt="" srcset="">
                    </div>
                    <a href = 'event.php?id=12' class='exhibition-button'>
                        VISITE
                    </a>
                </div>
            </div>
            </div>
            <div class="collection">
                <h1>
                    NOSSAS OBRAS
                </h1>
                <div class="slider">
                  
                    <div class="slider-row ">
                        <?php 
                        foreach ($collection as $item) 
                        {
                        ?>
                        <div class="collection-item ">          
                            <img src=<?php echo "./static/images/collection/".$item['imageName']; ?>  alt="">   
                        </div>
                    <?php 
                        }
                    ?>
                    </div>
                </div>
                <a href="collection.php" class="visit-button">
                    VEJA MAIS
                </a>
            </div>
        </div>
       

        
    </div>



<?php 
        include './inc/footer_inc.php';
?>