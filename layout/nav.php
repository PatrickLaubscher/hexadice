
<nav class="navbar navbar-expand-lg bg1">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/svg/hexadice-logo-alter-v1.svg" alt="" width="220" alt="Hexadice logo">
        </a>
        <a class="navbar-toggler" type="a" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item d-flex justify-content-center align-items-end">
                <a class="nav-link <?php echo $title== 'Accueil' ? 'active':''; ?> d-flex flex-column align-items-center" href="index.php" title="Accueil">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                    </svg>
                    <span>Accueil</span>
                </a>
            </li>
            <li class="nav-item d-flex justify-content-center align-items-end">
                <a class="nav-link <?php echo $title== 'Contact' ? 'active':''; ?> d-flex flex-column align-items-center" href="contact.php" title="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                    </svg>
                    <span>Contact</span>
                </a>
            </li>
            <li class="nav-item d-flex justify-content-center align-items-end">
            <?php
            if(!isset($_SESSION['employee']) || !isset($_SESSION['customer'])) { ?>
                <a class="nav-link <?php echo $title== 'Login' ? 'active':''; ?> d-flex flex-column align-items-center" href="login_customer.php" title="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                    <span>Login</span>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item d-flex justify-content-center align-items-end">
                <a class="nav-link <?php echo $title== 'Panier' ? 'active':''; ?> d-flex flex-column align-items-center" href="shopping_cart.php" title="">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <span>x 
                            <?php $qty = 0;
                            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                                echo $qty;
                                } else {
                                foreach($_SESSION['cart'] as $item) {
                                    $qty = $qty + intval($item['qty']);
                                } 
                                echo $qty;
                                }?>
                        </span>
                    </div>
                    <span>Panier</span>
                </a>
            </li>

            <?php if(!empty($_SESSION['employee']) || !empty($_SESSION['customer'])){ ?>

            <?php if($_SESSION['employee'] === true){ ?>
            <li class="nav-item d-flex justify-content-center align-items-end">
                <a class="nav-link <?php echo $title== 'Backoffice' ? 'active':''; ?> d-flex flex-column align-items-center" href="admin/admin.php" title="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-house-gear-fill" viewBox="0 0 16 16">
                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708z"/>
                    <path d="M11.07 9.047a1.5 1.5 0 0 0-1.742.26l-.02.021a1.5 1.5 0 0 0-.261 1.742 1.5 1.5 0 0 0 0 2.86 1.5 1.5 0 0 0-.12 1.07H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6 4.724 4.724a1.5 1.5 0 0 0-1.654 1.03"/>
                    <path d="m13.158 9.608-.043-.148c-.181-.613-1.049-.613-1.23 0l-.043.148a.64.64 0 0 1-.921.382l-.136-.074c-.561-.306-1.175.308-.87.869l.075.136a.64.64 0 0 1-.382.92l-.148.045c-.613.18-.613 1.048 0 1.229l.148.043a.64.64 0 0 1 .382.921l-.074.136c-.306.561.308 1.175.869.87l.136-.075a.64.64 0 0 1 .92.382l.045.149c.18.612 1.048.612 1.229 0l.043-.15a.64.64 0 0 1 .921-.38l.136.074c.561.305 1.175-.309.87-.87l-.075-.136a.64.64 0 0 1 .382-.92l.149-.044c.612-.181.612-1.049 0-1.23l-.15-.043a.64.64 0 0 1-.38-.921l.074-.136c.305-.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 1-.92-.382ZM12.5 14a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                    </svg>
                    <span>Backoffice</span> 
                </a>
            </li><?php } else if ($_SESSION['customer'] === true) { ?>
            <li class="nav-item d-flex justify-content-center align-items-end">
                <a class="nav-link <?php echo $title== 'Espace client' ? 'active':''; ?> d-flex flex-column align-items-center" href="page_customer.php" title="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                    </svg>
                    <span>Espace client</span> 
                </a>
                <?php } ?>

            <li class="nav-item d-flex justify-content-center align-items-end">
            <a class="nav-link ms-2 d-flex flex-column align-items-center" href="process/session_stop.php" title="">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                </svg>
                <span>Log out</span> 
            </a>
            
            <?php } ?>

        </ul>
        </div>
    </div>

</nav>