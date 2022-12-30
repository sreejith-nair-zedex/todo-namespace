<?php
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    if ($_GET["error"]=="password") {
        echo '<script>if(!alert("INVALID PASSWORD")) document.location = "index.php";</script>';
    }
    if ($_GET["error"]=="email") {
        echo '<script>if(!alert("INVALID EMAIL")) document.location = "index.php";</script>';
    }
}
?>
<div class="row mt-5">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form id="user-login" action="Controller/authentication.php" method="post">
            <center>
                <h3>Login</h3>
            </center>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" >
            </div>
            <div class="mb-3">
                <button type="submit" id="login-btn" name="login" class="btn btn-primary">Login</button>
                <span class="text-danger"></span>
                <a class="text-primary float-end text-decoration-none" href="#">Create Account?</a>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>