<?php 
namespace templates\Task;
session_start();
// include "./Models/Task.php";
require_once "Controller/task.php";
use Models\Task;
$task = new Task();
?>
<div class="row m-3">
    <div class="col-lg-6 text-danger">
        Welcome <?php echo $_SESSION["username"]; ?>! Your task
    </div>
    <div class="col-lg-6">
        <button class="btn btn-primary float-end ms-2" data-bs-toggle="modal" data-bs-target="#addTask">
            Add New Task
        </button>
    </div>
</div>
<?php
$uId = (int)$_SESSION["id"];
$datas = $task->getTaskByUserId($uId);
// print_r($datas);
if (count($datas)>0) :
?>
<div class="row m-3">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $data) : ?>
                    <tr>
                        <td><?php echo $data[1]; ?></td>
                        <?php $status = ($data[3]) ? "Done" : "Pending"; ?>
                        <td><?php echo $status; ?></td>
                        <td>
                            <a href="index.php?tid=<?php echo $data[0]; ?>&action=viewUpdateForm" class="btn btn-success btn-sm ms-2">Update</a>
                            <a href="Controller/task.php?tid=<?php echo $data[0]; ?>&action=deleteTask" class="btn btn-danger btn-sm ms-2">Delete</a>
                        </td>
                    <?php endforeach; ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
    <div class="row" style="margin-top: 10%;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 class="text-danger">No Task Found!</h3>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php endif; ?>
<!--Add Task Modal -->
<div class="modal fade" id="addTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="staticBackdropLabel">Add New Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Controller/task.php" method="post">
                    <div class="mb-3">
                        <label for="task" class="form-label">Task <span class="text-danger"></span></label>
                        <input type="text" class="form-control" name="taskName" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="addtasktodb">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script></script>
<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if ($_GET["error"]=="taskName") {
        echo '<script>if(!alert("Task cannot be empty!")) document.location = "index.php?action=viewDashBoard";</script>';
    }
}


