<?php
include 'includes/db_connection.php';

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    $query = "INSERT INTO users (username, user_password) VALUES (:username,:user_password)";
    $insertRegister = $bdd->prepare($query);
    if(!$insertRegister){
        die("Query Failed ".$bdd->errorInfo());
    }else{
        $insertRegister->execute([
            ':username' => $username,
            ':user_password' => $password,
        ]);
    }
    header('Location: index.php');
}

?>