<?php
require_once("bootstrap.php");
$templateParams["titolo"] = "Riepilogo ordini";
$templateParams["nome"] = "template-summary-order.php";
$templateParams["products"] = $dbh->getCartProducts(getUserId());
require("template/base.php");
?>