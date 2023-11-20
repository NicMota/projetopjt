<?php 
include_once 'inc/header_inc.php';
?>


<div class="form-card">
    <form action="" method="post">
        <label for="">nome:</label>
        <input type="text" name="name" id="">
        <label for="desc">descrição:</label>
        <textarea type="text" name="desc" id="desc" cols="30" rows="10"></textarea>
        
        <label for="">data:</label>
        <input type="date" name="date" id="" >
        <label for=''>quantidade de ingressos </label>
        <input type="number" name="tickets_amnt" id="">
        <label for="">preço:</label>
        <input type="number" name="price" id="">
        <button type='submit' name='submit'>create</button>
    </form>
</div>


<?php 
include_once 'inc/footer_inc.php';
?>
<?php 
    if(isset($_POST['submit']))
    {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $eventController->createEvent($data);

        header('location: createEvent.php');
    }
    
?>