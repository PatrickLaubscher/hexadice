<?php
$title="Messagerie client";
require_once __DIR__ . '/layout/header_admin.php';

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    $_SESSION['error'] = 1;
    Controller::redirect('../index.php');
}

$message = new Message($db);

try {
    $messageList = $message->getAllMessage();
} catch (PDOException $e) {
    $_SESSION['error'] = 12;
    Controller::redirect('admin.php');
}

$itemPerPage = 8;
$pagination = new Pagination($itemPerPage, $messageList);


?>




<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="my-4 fs-2">Espace service client</h1>
                    <h2 class="mb-5 fs-3">Consulter les messages des clients et les traiter</h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row d-flex flex-column align-items-center">
                <div class="col-8 d-flex flex-column">
                    <h2 class="mb-4 fs-3">Liste des messages</h2>
                    <div class="mb-4 border">
                        <?php foreach($messageList as $message) { ?>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column ps-2">
                                    <div><span class="fs-info">Ref message: </span><?php echo $message['contact_id']?></div>
                                    <div><pan class="fs-info">Date: </pan><?php echo $message['contact_date']?></div>
                                </div>
                                <div class="col-4 d-flex flex-column ps-2">
                                    <p class="fs-info mb-1">Informations client</p>
                                    <p class="mb-1">
                                        <?php echo $message['contact_firstname']?>
                                        <?php echo $message['contact_lastname']?>
                                    </p>
                                    <p>
                                        <?php echo $message['contact_email']?>
                                    </p>
                                </div>
                            </div>

                            <div class="mt-3 mb-4 ps-3 ">
                                <span class="fs-info">Objet du message: </span>
                                <?php if($message['contact_object'] == 1) {?> 
                                Demande d'information
                                <?php } ?>
                                <?php if($message['contact_object'] == 2) {?> 
                                    SAV
                                <?php } ?>
                                <?php if($message['contact_object'] == 3) {?> 
                                    Devis d'entreprise
                                <?php } ?>
                            </div>
                            <div class="ps-3 mb-4">
                                <span class="fs-info">Message: </span>
                                <?php echo $message['contact_message']?>
                            </div>
                            
                            <div class="d-flex justify-content-end gap-2">
                                <a href="" class="btn btn-success fs-info">Répondre au message</a>
                                <a href="" class="btn btn-danger fs-info">Supprimer le message</a>
                            </div>
                       <?php } ?> 
                    </div>                
                </div>
            </div>
        </div>
    </section>

    <hr>


    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6 d-flex justify-content-around mb-4">
                    <a href="customer_message.php?page=<?php echo $pagination->prevPage() ?>" class="col-2 d-flex justify-content-center align-items-center gap-2 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                        </svg>
                    </a>

                    <?php $i = 1; while ($i <= $pagination->getTotalPage()) { ?>
                        <?php if($i == $pagination->getPageNb()) {?>
                            <p class="fw-bold"><?php echo $i?></p>
                        <?php } else { ?>
                        <a href="customer_message.php?page=<?php echo $i?>"><?php echo $i?></a>
                        <?php } ?>
                    <?php $i++; } ?>

                    <a href="customer_message.php?page=<?php echo $pagination->nextPage() ?>" class="col-2 d-flex justify-content-center align-items-center gap-2 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>


















<?php
require_once __DIR__ . '/layout/footer_admin.php';