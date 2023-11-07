<?php
include_once './inc/header_inc.php';

$collectionItems = $collectionController->index();
?>
<body>
    

    <div class="collection-grid">


<?php 
foreach ($collectionItems as $item) 
{
?>  
    
        <div class="collection-card">
            <img src="<?php echo './static/images/'.$item['imageName']; ?>">
        </div>



<?php 
}
?>
</div>
<?php
if(isset($_SESSION['id']))
{
?>
    <div class="comments">
        <div class="form-card">
            <form action="" method="post">
                <label for="comment">comment:</label>
                <textarea name="comment"  cols="80" rows="10">

                </textarea>
                <button name='submit' type="submit">send</button>
            </form>
        </div>
    </div>
<<<<<<< HEAD
</body>
<?php 
        include './inc/footer_inc.php';
?>
=======

    <div class="comments">
        <?php
        $comments = $commentController->index();
        foreach($comments as $comment)
        {
        ?>

                <h1>
                    <?php 
                        echo $comment['commentContent'];
                    ?>
                </h1>
            
        <?php
        }
        ?>
    </div>
    <?php
        if(isset($_POST['submit']))
        {   
            $comment = $_POST['comment'];
            $userId = $_SESSION['id'];

            $commentController->createComment($comment,$userId);
        }
    ?>
<?php
}
?>
</body>
>>>>>>> origin/main
