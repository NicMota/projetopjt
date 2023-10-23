<?php 
include_once 'inc/header_inc.php';

?>
<body>
    <div class="table-card">
        <div class="collection-tab form-card">
            <a href="addCollectionItem.php">Add Item</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>img:</th>
                    <th>name</th>
                    <th>author</th>
                </tr>
            </thead>
            <?php
                $collectionArray = $collectionController->index();
                
                foreach($collectionArray as $item)
                {

                
            ?>

                 <tr>
                    <td> 
                        <div class='img-1'>
                            <img src="<?php echo './static/images/'.$item['imageName']; ?>" alt="">
                        </div>
                    </td>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td>
                        <?php echo $item['author']; ?>
                    </td>
                 </tr>    
            <?php
                }
            ?>
        </table>
    </div>
   
    
</body>