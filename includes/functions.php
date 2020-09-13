<?php 
function display_task(){
    global $bdd;
    
    $get_task = $bdd->prepare("SELECT * FROM todo WHERE user_id = '1' AND end_task = '0' ");
    $get_task->execute();
    $the_task = '';
    while($row = $get_task->fetch()){
        $task = $row['task'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $the_task .= '<div class="row">
                        <div class="col-6">'.$task.'</div>
                        <div class="col-3">'.$start_date.'</div>
                        <div class="col-3">'.$end_date.'</div>
                      </div>';

    }
    return $the_task;
}
?>