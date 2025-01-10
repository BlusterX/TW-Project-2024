<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Home";
$templateParams["nome"] = "template-home.php";
$templateParams["products"] = $dbh->getAllProducts();

require("template/base.php");
?>