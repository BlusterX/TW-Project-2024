<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Shopping";
$templateParams["nome"] = "template-shopping.php";
$templateParams["products"] = $dbh->getAllProducts();
require("template/base.php");
?>