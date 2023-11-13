
<?php
    include_once 'inc/header_inc.php';
?>
<?php
$events = $eventController->index();
?>
<div class="table-card">
    
    <a href="createEvent.php">Create Event</a>
    
    <table>
        <thead>
            <tr>
                <th>name:</th>
                <th>desc:</th>
                <th>date:</th>
                <th>tickets_amnt:</th>
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
                    <a href='' class='yellow-button'>edit</a>
                </td>
                <td>
                    <a  href='' class='red-button'>delete</a>
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