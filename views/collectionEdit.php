<?php
    include_once 'inc/header_inc.php';
?>
<?php
     
      $id = '';
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        if($u = $collectionController->getItemById($id))
        {
          $item = $collectionController->getItemById($id);

        }
        
      }else
      {
        header('location: ./');
      }
    
      
?>
<?php
    if(isset($_POST['submit']))
    {
        $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        var_dump($data);
    }

?>

    <div class="form-card">
      <form action="" method="post">
            <label for="">Nome:</label>
            <input type="text" name="name" id="" value='<?=$item['name']?>'>
            <label for="">Autorr:</label>
            <input type="text" name="author" id="" value='<?=$item['author'];?>'>
            <div class="dragImage">
                <label for="itemImage" class='fileLabel'> <?=$item['imageName'];?>
                    <input id='itemImage' type="file" name='itemImage' accept="image/png, image/jpg, image/gif, image/jpeg">
                </label>
            </div>

        <button type="submit" name="submit">edit</button>
     

      </form>
    </div>
 


<?php 
        include './inc/footer_inc.php';
?>
