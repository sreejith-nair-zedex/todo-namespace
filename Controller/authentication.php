<?php
namespace Controller;
session_start();
// require_once "../Models/User.db.php";
require_once "../model_autoloader.php";
use Models\User;
$user = new User();

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*If login button is clicked*/
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $row = $user->getUserByEmail($email);

    if ($row["email"] == $email) {
        if ($row["password"] == $password) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["id"] = $row["id"];
            header("location:../index.php?action=viewDashBoard");
        } else {
            header("location:../index.php?error=password");
        }
    } else {
        header("location:../index.php?error=email");
    }
}

/*If logout is clicked*/
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET["action"] == "logout") {
        session_unset();
        session_destroy();
        header("location:../index.php");
    }
}

/*If register button is clicked */
if (isset($_POST["usertodb"])) {
    if (empty($_POST["username"])) {
        header("location:../index.php?action=viewRegister&error=emptyUsername");
    }else if(empty($_POST["email"])){
        header("location:../index.php?action=viewRegister&error=emptyEmail");
    }else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        header("location:../index.php?action=viewRegister&error=invalidEmail");
    } 
    else if(empty($_POST["password"])){
        header("location:../index.php?action=viewRegister&error=emptyPassword");
    } else {
        $username = input($_POST["username"]);
        $email = input($_POST["email"]);
        $password = md5(input($_POST["password"]));

        $user->register($username, $email, $password);
        header("location:../index.php");
    }
}
