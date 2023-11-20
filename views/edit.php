<?php
    include_once 'inc/header_inc.php';
?>
<?php
if(isset($_SESSION['id']) && isset($_GET['id']))
{
    if($_SESSION['id'] != $_GET['id'])
    {
        http_response_code(401);
        echo '<h1>acesso nao autorizado</h1>';
        exit;
    }
    $user = $userController->findUserById($_GET['id']);
   
}   
else
{
    http_response_code(400);
    echo '<h1>pagina não encontrada:c</h1>';
    exit;
}
if(isset($_POST['email']) )
{   

    $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    if($userController->edit($data))
    {
        header('location: userPage.php');
    };
}

?>
<div class="middle-content">
    <div class="form-card">
        <form action="" method='post'>
            <label for="username">nome de usuario:</label>
            <input type="text" name="user" id="" value="<?=$user['user']; ?>" >    
            <label for="username">nome:</label>
            <input type="text" name="name" id="" value="<?=$user['name']; ?>">
            <label for="username">telefone:</label>
            <input type="text" name="phone" id="" value="<?=$user['phone']; ?>">
            <label for="username">email:</label>
            <input type="text" name="email" id="" value="<?=$user['email']; ?>">
            <input type="hidden" name='id' value='<?=$_GET['id']?>'>
            <button type='submit'>editar</button>
        </form>
    </div>
</div>

<?php 
        include './inc/footer_inc.php';
?>
