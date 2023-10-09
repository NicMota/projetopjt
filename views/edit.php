<?php
      include_once '../controllers/UserController.php';
      $userController = new UserController();

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
<?php
    include_once 'inc/header_inc.php';
?>
<body>
    <div class="form-card">
      <form action="" method="post">
      <?php
            echo' <label for="username">username:</label>
                  <input type="text" name="userEdit" id="" value="'.$user['user'].'">
                  
                  <label for="username">name:</label>
                  <input type="text" name="nameEdit" id="" value="'.$user['name'].'">

                  <label for"admin"> role: </label>
                  <select name="roleEdit">
                    <option value="0"> user </option>
                    <option value="1"> admin </option>
                  </select>


                  <button type="submit" name="submit">edit</button>';
      ?>

      </form>
    </div>
 

<?php
    if(isset($_POST['submit']))
    {
        $userEdit = $_POST['userEdit'];
        $nameEdit = $_POST['nameEdit'];
        $roleEdit = intval($_POST['roleEdit']);
        $userController->editUser($id,$userEdit,$nameEdit,$roleEdit);
         
        
    }
    
?>
</body>
