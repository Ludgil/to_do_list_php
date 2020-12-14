<?php
session_start();
include 'includes/db_connection.php';
include 'includes/functions.php';
include 'includes/header.php';
?>
<div class="main v-100 w-100">
    <div class="row mt-5 ml-0 mr-0">
        <div class="col-3 col-sm-6 ml-auto mr-auto">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Create Account</h5>
                    <form action="registration.php" method="post">
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
                        <div class="col-12">Already got an account ? <a href="create_account.php">Log In</a></div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>