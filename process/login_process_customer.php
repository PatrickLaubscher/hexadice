<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/general.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();
session_start();


if (empty($_POST['email']) || empty($_POST['password'])) {
    redirect('../login_customer.php?error=' . INPUT_MISSING);
}

[
    'email' => $email,
    'password' => $password
] = $_POST;


try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    redirect('../index.php?error=' . CONNEXION_BBD);
    exit;
}


$query = "SELECT * FROM customer WHERE customer_email = :email";
$stmt = $db->prepare($query);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row && password_verify($password, $row['customer_pwd'])) {
    $isCustomer = true;
} 

if ($isCustomer) {
    $_SESSION['login'] = $email;
    $_SESSION['employee'] = false;
    $_SESSION['customer'] = true;
    redirect("Location: ../customer.php");
}

if ($_SESSION['employee']) {
    header("Location: ../admin.php");
}
else { 

    
?>

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


