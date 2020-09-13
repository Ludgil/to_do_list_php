<?php 
include 'includes/db_connection.php';
include 'includes/functions.php';
include 'includes/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-6">task</div>
                <div class="col-3">start</div>
                <div class="col-3">end</div>
            </div>
            <?php echo display_task() ?>
        </div>
        <div class="col-4">
            <?php
                include 'add_task.php';
            ?>
        </div>
    </div>    
</div>
<?php include 'includes/footer.php'; ?>
    
