<form action="task.php" method="post" id="form_add_task">
    <div class="form-group">
        <label for="task">Task :</label>
        <textarea class="form-control" name="task" id="task"></textarea>
    </div>
    <div class="form-group">
        <label for="date">End Task :</label>
        <input class="form-control" type="date" name="end_task" id="end_task">
    </div>
    <input class="btn btn-primary" type="submit" value="add" name='add'>
</form>