<?php
include 'includes/db_connection.php';

// add request 
if(isset($_REQUEST['add'])){
    $start_date = date('d-m-Y');
    $end_date = $_POST['end_task'];
    if(!empty($_POST['task'])){
        $task = trim($_POST['task']);
    }
    $query_task = "INSERT INTO todo (user_id,task, end_task, start_date, end_date) VALUES(:user_id,:task,:end_task,:start_date,:end_date)";
    $insert_task = $bdd->prepare($query_task);
    $data=array(
        ':user_id' => 1,
        ':task'=> $task,
        ':end_task'=> '0',
        ':start_date'=>$start_date,
        ':end_date'=>$end_date
        );
    $insert_task->execute($data);
    header('Location: index.php');
}

// validate request
if(isset($_REQUEST['validate'])){
    $task_id = $_REQUEST['validate'];
    $validate_query = "UPDATE todo SET end_task = '1' WHERE id = :id";
    $update_task = $bdd->prepare($validate_query);
    $update_task->bindParam(':id', $task_id);           
    $update_task->execute();
    header('Location: index.php');

}

// delete request
if(isset($_REQUEST['delete'])){
    $task_id = $_REQUEST['delete'];
    $delete_query = "DELETE FROM todo WHERE id = :id";
    $delete_task = $bdd->prepare($delete_query);
    $delete_task->bindParam(':id', $task_id);
    $delete_task->execute($data);
    header('Location: index.php');
}
?>