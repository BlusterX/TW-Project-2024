<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Admin";
$templateParams["nome"] = "template-admin.php";
$templateParams["products"] = $dbh->getAllProducts();
$templateParams["js"] = array("js/logout.js");

require("template/base.php");
?>