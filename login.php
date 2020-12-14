<?php
session_start();
include 'includes/db_connection.php';

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = $bdd->prepare($query);
    $select_user_query->execute();
 
    while($row = $select_user_query->fetch(PDO::FETCH_ASSOC)){
         $db_id = $row['user_id'];
         $db_user_password = $row['user_password'];
         $db_username = $row['username'];
         if(password_verify($password, $db_user_password)){
            $_SESSION['user_id'] = $db_id;
            $_SESSION['username'] = $db_username;
            header('Location: index.php');
         }
    }
    header('Location: index.php');
}

?>

