<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}
if(!isset($_GET["order_id"])) {
    exit("Errore: informazioni relative all'ordine mancanti");
}

$orderId = $_GET["order_id"];

$templateParams["titolo"] = "Dettaglio ordine";
$templateParams["nome"] = "template-summary-order.php";
$templateParams["order_id"] = $orderId;
$templateParams["products"] = $dbh->getOrderedProducts($orderId);
$templateParams["js"] = array("js/logout.js");
require("template/base.php");
?>