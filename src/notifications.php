<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Notifications";
$templateParams["nome"] = "template-notifications.php";
$templateParams["products"] = $dbh->getAllProducts();

require("template/base.php");
?>