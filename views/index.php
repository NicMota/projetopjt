<?php 
    include_once 'inc/header_inc.php';
?>
<?php
    $collection = $collectionController->index();
?>
<body>
  
    <div class="content">

        <div class='top-content'>
            <h1> 
                MUSEU PAULO AGOSTINHO SOBRINHO
            </h1>
            <img src="./static/images/museum.jpg" id='image-museum'>
        </div>
        <div class="middle-content">
            <h1 id='exhibition-text'>
                    IN EXHIBITION
            </h1>
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
                            <img src=<?php echo "./static/images/".$item['imageName']; ?>  alt="">   
                        </div>
                    <?php 
                        }
                    ?>
                </div>
                <a href="collection.php" class="visit-button">
                    VISIT 
                </a>
            </div>
        </div>
       

        
    </div>
   <script src='./static/js/usersHome.js'>

   </script>
</body>
<?php
    include_once './inc/footer_inc.php';
?>