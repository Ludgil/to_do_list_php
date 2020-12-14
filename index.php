<?php
session_start();
include 'includes/db_connection.php';
include 'includes/functions.php';
include 'includes/header.php';
?>

<?php 
    if(isset($_SESSION['username'])){
?>
<div class="container">
    <div class="row justify-content-end mt-5">
        <h5 class="mr-5">Username : <?= $_SESSION['username'] ?></h5>
        <a class="btn btn-danger" href="logout.php">Log Out</a>
    </div>
    <div class="row mt-5">
        <div class="col-12 task_form">
            <?php
                include 'add_task.php';
            ?>
        </div>
        <div class="col-12">
            <div class="row task_head">
                <div class="col-6">Task</div>
                <div class="col-2">Start</div>
                <div class="col-2">End</div>
                <div class="col-1">Done</div>
                <div class="col-1">Delete</div>
            </div>
            <div id = "current_task">
                <?php echo display_task() ?>  
                <template id="display_task">
                    <div class="row to_do">
                        <div class="col-6" id="the_task"></div>
                        <div class="col-2" id="the_start"></div>
                        <div class="col-2" id="the_end"></div>
                        <div class="col-1"><button type="submit" class="btn btn-primary btnValidate" id="for_val" name="validate" value="">V</button></div>
                        <div class="col-1"><button type="submit" class="btn btn-danger btnDelete" id="for_del" name="delete" value="">X</button></div>
                      </div>
                </template>         
            </div>
            <hr>
            <div id="finished_task">
                <?php echo display_finished_task() ?>
                <template id="display_finished_task">
                    <div class="row finished_task">
                        <div class="col-6" id="the_finished_task"></div>
                        <div class="col-2" id="the_finished_start"></div>
                        <div class="col-2" id="the_finished_end"></div>
                        <div class="col-1"></div>
                        <div class="col-1"><button type="submit" class="btn btn-danger btnDelete" id="finished_btn_del" form="task_form" name="delete" value="">X</button></div>
                    </div>
                </template>
            </div>
        </div>
    </div>    
</div>
<?php
}else{
?>
    <div class="main v-100 w-100">
    <div class="row mt-5 ml-0 mr-0">
        <div class="col-3 col-sm-6 ml-auto mr-auto">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Log In</h5>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <div class="col-12">
                                <label for="username">Username :</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="col-12">
                                <label for="password">Password :</label>
                                <input type="text" class="form-control" name="password" placeholder="Password"> 
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <input type="submit" class="btn btn-primary mt-3" value="Submit">
                            </div>
                        </div>
                    </form> 
                    <div class="row">   
                        <div class="col-12">No account yet ? <a href="create_account.php">Create Account</a></div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<?php include 'includes/footer.php'; ?>
    
