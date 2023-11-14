<?php 
    include_once 'inc/header_inc.php';
?>
<?php
    $collection = $collectionController->index();
?>


    <div class="content">

        <div class='top-content'>
            <div class="museum-img">

            </div>
            
        </div>
        <div class="middle-content">
            
            <div class="exhibition">
                <div class="exhibition-card"> 
                    <div class="exhibition-content">
                        <img src="./static/images/eventsIcons/evento1.jpg" alt="" srcset="">
                    </div>
                    <a href ='monalisa.php'class='exhibition-button'>
                        VISITE
                    </a>
                </div>
                <div class="exhibition-card">   
                    <div class="exhibition-content">
                        <img src="./static/images/eventsIcons/evento2.jpg" alt="" srcset="">
                    </div>
                    <a href=''class='exhibition-button'>
                        VISITE
                    </a>
                </div>
                <div class="exhibition-card">   
                    <div class="exhibition-content">
                        <img src="./static/images/eventsIcons/evento3.jpg" alt="" srcset="">
                    </div>
                    <a href = '' class='exhibition-button'>
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
                  
                    <div class="slider-row active">
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