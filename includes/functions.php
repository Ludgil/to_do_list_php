<?php 
function display_task(){
    global $bdd;
    
    $get_task = $bdd->prepare("SELECT * FROM todo WHERE user_id = '1' AND end_task = '0' ");
    $get_task->execute();
    $the_task = '<form method="post" action="task.php">';
    while($row = $get_task->fetch()){
        $task_id = $row['id'];
        $task = $row['task'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $the_task .= '<div class="row">
                        <div class="col-6">'.$task.'</div>
                        <div class="col-2">'.$start_date.'</div>
                        <div class="col-2">'.$end_date.'</div>
                        <div class="col-1"><button type="submit" name="validate" value="'.$task_id.'">V</button></div>
                        <div class="col-1"><button type="submit" name="delete" value="'.$task_id.'">X</button></div>
                      </div>';         
    }
    $the_task .= '</form>';
    return $the_task;
}

function display_finished_task(){
    global $bdd;
    
    $get_finished_task = $bdd->prepare("SELECT * FROM todo WHERE user_id = '1' AND end_task = '1' ");
    $get_finished_task->execute();
    $the_task = '';
    while($row = $get_finished_task->fetch()){
        $task_id = $row['id'];
        $task = $row['task'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $the_task .= '<div class="row">
                        <div class="col-6">'.$task.'</div>
                        <div class="col-2">'.$start_date.'</div>
                        <div class="col-2">'.$end_date.'</div>
                      </div>';         
    }
    $the_task .= '</form>';
    return $the_task;

}
?>