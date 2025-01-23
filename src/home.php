<?php
require_once("bootstrap.php");

$templateParams["products_with_discount"] = $dbh->getProductWithDiscount();
$templateParams["titolo"] = "Home";
$templateParams["nome"] = "template-home.php";
$templateParams["products"] = $dbh->getAllProducts();
$templateParams["js"] = array("js/logout.js");
require("template/base.php");
?>