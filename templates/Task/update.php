<?php
namespace templates\Task;
// require_once "./Models/Task.php";
$tid = $_GET["tid"];
use Models\Task;
$task = new Task();
$updateRow = $task->getTaskByTaskId($tid);
?>
<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="Controller/task.php" method="post">
            <input type="hidden" name="tid" value="<?php echo $updateRow["id"]; ?>">
            <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <input type="text" class="form-control" name="updateTaskName" value="<?php echo $updateRow["taskName"]; ?>">
            </div>
            <?php
            $value = $updateRow["status"];
            $option = ($value) ? "Done" : "Pending";
            $option2 = (!$value) ? "Done" : "Pending";
            ?>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="updateStatus">
                <option value="<?php echo $value; ?>"><?php echo $option; ?></option>
                <option value="<?php echo !$value; ?>"><?php echo $option2; ?></option>
            </select>

            <div class="d-grid">
                <button type="submit" class="btn btn-success" name="updateTask">Update Task</button>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if ($_GET["error"]=="updateTaskName") {
        $tid=$_GET["tid"];
        echo '<script>if(!alert("Task cannot be empty!")) document.location = "index.php?tid='.$tid.'&action=viewUpdateForm";</script>';
    }
}