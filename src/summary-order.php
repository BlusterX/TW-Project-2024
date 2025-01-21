<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["titolo"] = "Riepilogo ordini";
$templateParams["nome"] = "template-summary-order.php";
$templateParams["orders"] = $dbh->getAllOrders(getUserId());

require("template/base.php");
?>