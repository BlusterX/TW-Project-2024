<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Home";
$templateParams["nome"] = "template-home.php";
$templateParams["products"] = $dbh->getAllProducts();
$templateParams["js"] = array("js/logout.js");
require("template/base.php");
?>