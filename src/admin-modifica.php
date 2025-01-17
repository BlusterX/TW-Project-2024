<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Modifica-Prodotto";
$templateParams["nome"] = "template-admin-modifica.php";
$templateParams["product"] = $dbh->getProductById($_GET["id"]);
require("template/base.php");
?>