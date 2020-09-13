<?php
include 'includes/db_connection.php';
if(isset($_POST['add'])){
    $start_date = date('d-m-Y');
    $end_date = $_POST['end_task'];
    if(!empty($_POST['task'])){
        $task = trim($_POST['task']);
    }
    $query_task = "INSERT INTO todo (user_id,task, end_task, start_date, end_date) VALUES(:user_id,:task,:end_task,:start_date,:end_date)";
    $insert_task = $bdd->prepare($query_task);
    $data=array(
        'user_id' => 1,
        ':task'=> $task,
        ':end_task'=> '0',
        ':start_date'=>$start_date,
        ':end_date'=>$end_date
        );
    $insert_task->execute($data);
    header('Location: index.php');
}
?>