
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">HexaDice</a>
        <a class="navbar-toggler" type="a" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php" title="Accueil">Accueil-svg</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="contact.php" title="">Contactez-nous-svg</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="login_customer.php" title="">login-svg</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="about.php" title="">A propos</a>
            </li>

            <?php
            if(!empty($_SESSION)){ ?>

            <?php
            if($_SESSION['employee'] === true){ ?>
            <li class="nav-item">
            <a class="nav-link" href="admin/admin.php" title="">Admin</a>
            </li><?php } else if ($_SESSION['customer'] === true) { ?>
            <li class="nav-item">
            <a class="nav-link" href="customer.php" title="">Page client</a>

                <?php } ?>
            <li class="nav-item">
            <a class="nav-link" href="process/session_stop.php" title="">Log Out</a>
            
            <?php } ?>

        </ul>
        </div>
    </div>

</nav>