<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/general.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();
session_start();


if (isset($_POST['email']) && isset($_POST['password'])) {

    [
        'email' => $email,
        'password' => $pass
    ] = $_POST;

    //$hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

    try {
        $db = Database::getInstance();
    } catch (PDOException $e) {
        redirect('../login.php?error=' . CONNEXION_BBD);
        exit;
    }
    
    
    $query = 'SELECT * FROM user WHERE email=:email AND pwd=:pass';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $_SESSION['login'] = $email;
        $_SESSION['pass'] = $pass;
        $_SESSION['employee'] = false;
        $_SESSION['customer'] = true;
    }

    $db = Database::getInstance();
    $query = 'SELECT * FROM employee WHERE email=:email AND pwd=:pass';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $_SESSION['login'] = $email;
        $_SESSION['pass'] = $pass;
        $_SESSION['customer'] = false;
        $_SESSION['employee'] = true;
    }


}
    if ($_SESSION['employee']) {
        header("Location: ../admin.php");
    } else if ($_SESSION['customer']) {
        header("Location: ../customer.php");
    }
    else { session_unset() ?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>Vous n'avez pas été reconnu(e)</p>
                    <p><a href="../login.php">Nouvel essai</p>
        <?php } ?>
                </div>
            </div>
        </div>
    </section>


</main>


