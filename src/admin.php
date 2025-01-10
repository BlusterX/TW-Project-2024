<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Admin";
$templateParams["nome"] = "template-admin.php";
$templateParams["products"] = $dbh->getAllProducts();

require("template/base.php");
?>