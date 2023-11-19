<?php
    include_once 'inc/header_inc.php';
?>
<?php
      $event = 
      [
        'name' => '',
        'desc' => '',
        'date' => '',
        'tickets_amnt' => ''
      ];
      
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
          
          $event['tickets_amnt'] = $e['tickets_amnt'];
        }
        
      }else
      {
        header('location: ./');
      }
    
      
?>


    <div class="form-card">
      <form action="" method="post">
        
        <label for="">name:</label>
        <input type="text" name="name" id="" value="<?=$event['name'];?> ">
        <label for="desc">desc:</label>
        <textarea type="text" name="desc" id="desc" cols="30" rows="10"><?=$event['desc'];?></textarea>
        
        <label for="">date:</label>
        <input type="date" name="date" value="<?=$event['date']?>">
        <label for=''>tickets_amt </label>
        <input type="number" name="tickets_amnt" id="" value="<?=$event['tickets_amnt'];?>">

        <button type="submit" name="submit">edit</button>
     

      </form>
    </div>
 

<?php
    if(isset($_POST['submit']))
    {
        $userEdit = $_POST['userEdit'];
        $nameEdit = $_POST['nameEdit'];
        $roleEdit = intval($_POST['roleEdit']);
        $userController->editUser($id,$userEdit,$nameEdit,$roleEdit);
        header("Location: ./edit.php");

    }
    
?>
<?php 
        include './inc/footer_inc.php';
?>
