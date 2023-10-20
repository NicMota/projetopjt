<?php 
    include_once 'inc/header_inc.php';

?>
<body>
    
    <div class="form-card">
        <form action="" method="post">
            <label for="">Name:</label>
            <input type="text" name="name" id="">
            <label for="">Author:</label>
            <input type="text" name="author" id="">
            <div class="dragImage">
                <label for="itemImage" class='fileLabel'>Item Image:
                    <input id='itemImage' type="file" name='itemImage' accept="image/png, image/jpg, image/gif, image/jpeg">
                </label>
            </div>
            <button name='submit' type='submit'> add </button>
        </form>
    </div>
</body>

<?php       
  

  
    if(isset($_POST['submit']))
    {
    
        $name = $_POST['name'];
        $author = $_POST['author'];
        
        $itemImage = $_POST['itemImage'];
        echo $itemImage;

        
       
       
        $collectionController->addItem($name,$author,$itemImage);
        
    }
?>