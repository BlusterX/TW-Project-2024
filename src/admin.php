<?php
require_once("bootstrap.php");

if (!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["titolo"] = "Admin";
$templateParams["nome"] = "template-admin.php";
$templateParams["products"] = $dbh->getAllProducts();
$templateParams["js"] = array("js/logout.js", "js/confirm-delete.js");

require("template/base.php");
?>