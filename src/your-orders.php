<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["titolo"] = "I tuoi ordini";
$templateParams["nome"] = "template-your-orders.php";
$templateParams["orders"] = $dbh->getAllOrdersNewestFirst(getUserId());
$templateParams["js"] = array("js/order-status.js", "js/logout.js");
require("template/base.php");
?>