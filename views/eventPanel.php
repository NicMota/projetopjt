
<?php
    include_once 'inc/header_inc.php';
?>
<?php
$events = $eventController->index();
?>

<?php
if(isset($_GET['delete']))
{   
    
    $id = intval($_GET['id']); 
    $eventController->delete($id);

    header("Location: collectionPanel.php");

}
?>   


<div class="table-card">
    
    <a href="createEvent.php">Criar Evento</a>
    
    <table>
        <thead>
            <tr>
                <th>nome:</th>
                <th>desc:</th>
                <th>data:</th>
                <th>quantidade <br> de ingressos:</th>
            </tr>
        </thead>
        <?php
        foreach($events as $event): 
        ?>
            <tr>
                <td> 
                   <?=$event['name']?>
                </td>
                <td>
                    <?=$event['desc']?>
                </td>
                <td>
                    <?=$event['date']?>
                </td>
                <td>
                    <?=$event['tickets_amnt']?>
                </td>
                <td>
                    <a href='eventEdit.php?id=<?=$event['id']?>' class='yellow-button'>editar</a>
                </td>
                <td>
                    <button data-value='<?=$event['id']?>' class='red-button openModal'>deletar</button>
                </td>
            </tr>    

        <?php 
        endforeach;
        ?>
</table>
</div>
<?php
    include_once 'inc/footer_inc.php';
?>