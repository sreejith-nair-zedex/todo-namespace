<div class="row mt-5">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <center>
            <h3>Register</h3>
        </center>
        <form action="Controller/authentication.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" name="password">
            </div>

            <button type="submit" name="usertodb" class="btn btn-primary">Register</button>

        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    if ($_GET["error"]=="emptyUsername") {
        echo '<script>if(!alert("Username Cannot Be Empty")) document.location = "index.php?action=viewRegister";</script>';
    }
    if ($_GET["error"]=="emptyEmail") {
        echo '<script>if(!alert("Email Cannot Be Empty")) document.location = "index.php?action=viewRegister";</script>';
    } 
    if ($_GET["error"]=="emptyPassword") {
        echo '<script>if(!alert("Password Cannot Be Empty")) document.location = "index.php?action=viewRegister";</script>';
    }
    if ($_GET["error"]=="invalidEmail") {
        echo '<script>if(!alert("Invalid Email")) document.location = "index.php?action=viewRegister";</script>';
    }
}