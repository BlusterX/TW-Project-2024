<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "I tuoi ordini";
$templateParams["nome"] = "template-your-orders.php";
$templateParams["products"] = $dbh->getCartProducts(getUserId());
require("template/base.php");
?>