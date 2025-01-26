<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}
if(!isset($_GET["cart_id"])) {
    exit("Errore: informazioni relative all'ordine mancanti");
}

$cartId = $_GET["cart_id"];

$templateParams["title"] = "Dettaglio ordine";
$templateParams["name"] = "template-summary-order.php";
$templateParams["cart_id"] = $cartId;
$templateParams["products"] = $dbh->getCartProducts(getUserId());
$templateParams["js"] = array("js/logout.js");
require("template/base.php");
?>