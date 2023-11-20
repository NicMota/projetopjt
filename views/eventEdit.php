<?php
    include_once 'inc/header_inc.php';
?>
<?php
      $event = 
      [
        'name' => '',
        'desc' => '',
        'date' => '',
        'tickets_amnt' => '',
        'price' => ''
      ];
      $id = '';
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        if($u = $eventController->getEventById($id))
        {
          $e = $eventController->getEventById($id);
          
          $event['name'] = $e['name'];
          $event['desc'] = $e['desc'];
          $event['date'] = new DateTime($e['date']);
          $event['date'] = $event['date']->format("Y-m-d");
          $event['price'] = $e['price'];
          $event['tickets_amnt'] = $e['tickets_amnt'];
        }
        
      }else
      {
        header('location: ./');
      }
    
      
?>


    <div class="form-card">
      <form action="" method="post">
        <input type="hidden" name="id" value='<?=$id;?>'>
        <label for="">name:</label>
        <input type="text" name="name" id="" value="<?=$event['name'];?> ">
        <label for="desc">desc:</label>
        <textarea type="text" name="desc" id="desc" cols="30" rows="10"><?=$event['desc'];?></textarea>
        
        <label for="">date:</label>
        <input type="date" name="date" value="<?=$event['date']?>">
        <label for=''>tickets_amt </label>
        <input type="number" name="tickets_amnt" id="" value="<?=$event['tickets_amnt'];?>">
        <label for=''>preço: </label>
        <input type="number" name="price" id="" value="<?=$event['price'];?>">

        <button type="submit" name="submit">edit</button>
     

      </form>
    </div>
 

<?php
    if(isset($_POST['submit']))
    {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($eventController->editEvent($data))
        {
          header("Location: eventPanel.php");
        };
        

    }
    
?>
<?php 
        include './inc/footer_inc.php';
?>
