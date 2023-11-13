<?php 
    include_once 'inc/header_inc.php';
?>
<?php
    $collection = $collectionController->index();
?>


    <div class="content">

        <div class='top-content'>
            <h1 id='mpas'> 
                MUSEU PAULO AGOSTINHO SOBRINHO
            </h1>
            <img src="./static/images/museum.jpg" id='image-museum'>
        </div>
        <div class="middle-content">
            
            <div class="exhibition">
                <div class="exhibition-card"> 
                    <div class="exhibition-content">
                        
                    </div>
                    <a href ='monalisa.php'class='exhibition-button'>
                        access
                    </a>
                </div>
                <div class="exhibition-card">   
                    <div class="exhibition-content">
                    
                    </div>
                    <a href=''class='exhibition-button'>
                        access
                    </a>
                </div>
                <div class="exhibition-card">   
                    <div class="exhibition-content">
                        
                    </div>
                    <a href = '' class='exhibition-button'>
                        access
                    </a>
                </div>
            </div>
            </div>
            <div class="collection">
                <h1>
                    OUR COLLECTION
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
                    VISIT 
                </a>
            </div>
        
       

        
    </div>



<?php 
        include './inc/footer_inc.php';
?>