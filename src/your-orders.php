<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}

if(isset($_GET["order_id"])) {
    $idOrder = $_GET["order_id"];
    $dbh->generateShippingDate($idOrder);

    $notificationTitle = "L'ordine #" . $idOrder . " è in spedizione";
    $products = $dbh->getOrderedProducts($idOrder);

    $notificationMessage = "Prodotti ordinati:";
    foreach($products as $product) {
        $notificationMessage .= "<br/>" . $product["name"] . " x" . $product["quantity"];
    }
    $dbh->createNotification(getUserId(), $notificationTitle, $notificationMessage);
}

$templateParams["titolo"] = "I tuoi ordini";
$templateParams["nome"] = "template-your-orders.php";
$templateParams["orders"] = $dbh->getAllOrdersNewestFirst(getUserId());
$templateParams["js"] = array("js/order-status.js", "js/logout.js");
require("template/base.php");
?>