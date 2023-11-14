<?php
include_once './inc/header_inc.php';

$collectionItems = $collectionController->index();
?>

    

    <div class="collection-grid">


<?php 
foreach ($collectionItems as $item) 
{
?>  

        <div class="collection-card">
            <div class="collection-image">
                <img src="<?php echo './static/images/collection/'.$item['imageName']; ?>">
            </div>
            <div class="collection-desc">
                <h1> <?=$item['name'] ?></h1>
            </div>
           
        </div>
<?php 
}
?>
</div>
<?php
if(isset($_SESSION['id']))
{
?>
    <div class="comment-form">
            <form action="" method="post">
                <label for="comment">COMENTE AQUI!</label>
                <textarea name="comment"  cols="60" rows="5"></textarea>
                <button name='submit' type="submit">COMENTAR</button>
            </form>
    </div>

    <?php


    if(isset($_POST['submit']) && isset($_POST['comment']))
    {   
        $comment = $_POST['comment'];
        $userId = $_SESSION['id'];

        if($commentController->createComment($comment,$userId) != false)
        header("Location: collection.php");
        exit;
        
    }
  
    ?>
    <div class="comments">
        <h1>
            COMENTARIOS
        </h1>
        <?php
        $comments = $commentController->index();
        foreach($comments as $comment)
        {
            $user = $commentController->getCommentUser($comment['user_id']);
            
        ?>  
            <div class="comment-card">
                <h1>
                    <?=$user['name'];?>
                </h1>
                <p>    
                    <?=$comment['commentContent'];?>
                </p>
                <h3>
                    <?=$comment['date_added'];?>
                </h3>
                
            </div>
                
            
<?php
        }
}
?>
    </div>
   

<?php
        include 'inc/footer_inc.php'; 
?>
 
