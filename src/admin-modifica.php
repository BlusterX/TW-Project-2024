<?php
require_once("bootstrap.php");

if (!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["titolo"] = "Modifica-Prodotto";
$templateParams["nome"] = "template-admin-modifica.php";
$templateParams["product"] = $dbh->getProductById($_GET["id"]);
$templateParams["js"] = array("js/price-with-discount.js");
require("template/base.php");
?>