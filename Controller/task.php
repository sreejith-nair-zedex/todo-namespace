<?php
namespace Controller;
session_start();
require "../model_autoloader.php";
use Models\Task;

$task = new Task();
function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


/*If add task button is clicked */
if (isset($_POST["addtasktodb"])) {

    if (empty($_POST["taskName"])) {
        header("location:../index.php?action=viewDashBoard&error=taskName");
    } else {
        $taskName = input($_POST["taskName"]);
        $userId = (int)$_SESSION["id"];

        $task->add_task($taskName, $userId, 0);

        header("location:../index.php?action=viewDashBoard");
    }
}

/*If update button is clicked*/
if (isset($_POST["updateTask"])) {
    $tid = $_POST["tid"];
    if (empty($_POST["updateTaskName"])) {
        header("location:../index.php?tid=$tid&action=viewUpdateForm&error=updateTaskName");
    }
    else {
        $taskName = input($_POST["updateTaskName"]);
        $status = $_POST["updateStatus"];
        $task->updateTask($taskName, $status, $tid);
        header("location:../index.php?action=viewDashBoard");
    }
}

/*If delete button is clicked*/
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET["action"] == "deleteTask") {
        $tid = $_GET["tid"];
        $task->daleteTask($tid);
        header("location:../index.php?action=viewDashBoard");
    }
}
