<?php 
include_once 'inc/header_inc.php';

?>
<?php
if(isset($_GET['delete']))
{   
    
    $id = intval($_GET['id']); 
    $collectionController->delete($id);

    header("Location: eventPanel.php");

}
?>   

    <div class="table-card">
            <a href="addCollectionItem.php">Adidionar Obra</a>
     

        <table>
            <thead>
                <tr>
                    <th>img:</th>
                    <th>nome:</th>
                    <th>autor:</th>
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
                            <img src="<?php echo './static/images/collection/'.$item['imageName']; ?>" alt="">
                        </div>
                    </td>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td>
                        <?php echo $item['author']; ?>
                    </td>
                    <td>
                        <a href='' class='yellow-button'>edit</a>
                    </td>
                    <td>
                        <button     class='red-button openModal' data-value='<?=$item['id']?>'>delete</button>
                    </td>
                </tr>    
            <?php
                }
            ?>
        </table>
    </div>
   

<?php 
        include './inc/footer_inc.php';
?>
