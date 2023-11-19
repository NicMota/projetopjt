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
    if(isset($_POST['submit']) && isset($_FILES['itemImage']))
    {
      if(!empty($_FILES['itemImage']))
      {
        $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data['itemImage'] = basename($_FILES['itemImage']['name']);
        if($collectionController->editItem($data))
        { 
          
          $itemPath = './static/images/collection/'.$data['itemImage'];
          $res = move_uploaded_file($_FILES['itemImage']['tmp_name'],$itemPath);
          header('location: collectionPanel.php');
        }
      }
    }

?>

    <div class="form-card">
      <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name='id' value='<?=$id?>'>
            <label for="">Nome:</label>
            <input type="text" name="name" id="" value='<?=$item['name']?>'>
            <label for="">Autor:</label>
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
