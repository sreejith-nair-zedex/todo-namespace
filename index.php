<?php
require_once "model_autoloader.php";
session_start();
error_reporting(E_ERROR | E_PARSE); 
?>
<?php /*Header*/ require_once "./templates/header.php"; ?>
<?php /*Navbar*/ require_once "./templates/navbar.php"; ?>

<main>
    <div class="container">
        <?php 
        if (!($_SESSION["id"])) { 
            /* If user is not logged in then do this */
            if($_GET["action"]=="viewRegister"){ 
            /* If action is viewRegister then show Register */
                /*Register*/ require_once "./templates/Authenticate/register.php";
            }else {
            /* If action is not set to viewRegister then show Login */
                /*Login*/ require_once "./templates/Authenticate/login.php"; 
            }
        }
        else {
            /* If user is logged and action is viewDashBoard then show Dashboard */
            if ($_GET["action"]=="viewDashBoard") {
                /*Dashboard*/ require_once "./templates/Task/dashboard.php";    
            }else if ($_GET["action"]=="viewUpdateForm") {
                /*If user is trying to update then show update form*/
                /*Update Form*/ require_once "./templates/Task/update.php";
            }
        }
        ?>
    </div>
</main>
<?php /*Footer*/ include_once "./templates/footer.php"; ?>