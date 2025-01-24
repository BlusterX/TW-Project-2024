<?php
require_once("bootstrap.php");

$templateParams["products_with_discount"] = $dbh->getProductWithDiscount();
$templateParams["titolo"] = "Home";
$templateParams["nome"] = "template-home.php";
$templateParams["products"] = $dbh->getAllProducts();
$templateParams["js"] = array("js/tooltip.js", "js/list-update.js");

if(isUserLoggedIn() && !isAdmin()){
    $templateParams["js"][] = "js/logout.js";
}
require("template/base.php");
?>