<?php
require_once("bootstrap.php");

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit();
}
if (!isset($_POST["order_id"])) {
    echo json_encode(["success" => false, "message" => "Informazioni sull'ID dell'ordine mancanti."]);
    exit();
}

$idOrder = $_POST["order_id"];
//$products = $dbh->getOrderedProducts($idOrder);

$notificationTitle = "L'ordine #" . $idOrder . " è stato consegnato";
$notificationMessage = "";
/*
    $notificationMessage = "Prodotti consegnati:";
    foreach ($products as $product) {
        $notificationMessage .= "<br/>" . $product["name"] . " x" . $product["quantity"];
    }
    */
$dbh->createNotification(getUserId(), $notificationTitle, $notificationMessage);

echo json_encode(["success" => true, "message" => "Notifica creata."]);

?>
