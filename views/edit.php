<?php
    include_once 'inc/header_inc.php';
?>
<?php
      $user = 
      [
        'user' => '',
        'name' => '',
        'role' => ''
      ];
      
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        if($u = $userController->findUserById($id))
        {
          $u = $userController->findUserById($id);
          $user['user'] = $u['user'];
          $user['name'] = $u['name'];
          $user['role'] = $u['admin'];
        };
      }
    

?>

<body>
    <div class="form-card">
      <form action="" method="post">
       <label for="username">username:</label>
                  <input type="text" name="userEdit" id="" value="<?php echo $user['user']; ?>">
                  
                  <label for="username">name:</label>
                  <input type="text" name="nameEdit" id="" value="<?php echo $user['name']; ?>">

                  <label for="roleEdit"> role: </label>
                  <select name="roleEdit">
                    <?php
                    if($user['role'] == 1)
                    {
                    ?>
                      <option value="1"> admin </option>
                      <option value="0"> user </option>
                      
                    <?php 
                    }else if($user['role'] == 0)
                    {
                    ?>
                      <option value="0"> user </option>
                      <option value="1"> admin </option>
                      
                    <?php
                    }
                    ?>
                  </select>


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
</body>
