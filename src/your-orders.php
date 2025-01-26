<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["title"] = "I tuoi ordini";
$templateParams["name"] = "template-your-orders.php";
$templateParams["orders"] = $dbh->getAllOrdersNewestFirst(getUserId());
$templateParams["js"] = array("js/order-status.js", "js/logout.js", "js/show-orders.js");
require("template/base.php");
?>