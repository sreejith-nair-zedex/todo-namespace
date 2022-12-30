<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand">Todo Single Page Application</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="home page" href="index.php?action=viewDashBoard   1`1Q">Home</a>
                </li>
                <?php if( !$_GET["action"] == "viewDashBoard" || $_GET["action"] == "viewRegister") : ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="login page" href="index.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="register page" href="index.php?action=viewRegister">Register</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="logout page" href="Controller/authentication.php?action=logout">Logout</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>