<?php 
include 'includes/db_connection.php';
include 'includes/functions.php';
include 'includes/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-6">Task</div>
                <div class="col-2">Start</div>
                <div class="col-2">End</div>
                <div class="col-1">Done</div>
                <div class="col-1">Delete</div>
            </div>
            <?php echo display_task() ?>
            <hr>
            <?php echo display_finished_task() ?>
        </div>
        <div class="col-4">
            <?php
                include 'add_task.php';
            ?>
        </div>
    </div>    
</div>
<?php include 'includes/footer.php'; ?>
    
