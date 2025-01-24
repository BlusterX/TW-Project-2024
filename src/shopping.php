<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["titolo"] = "Shopping";
$templateParams["nome"] = "template-shopping.php";
$templateParams["cart_id"] = $dbh->getCartId(getUserId());
$templateParams["products"] = $dbh->getCartProducts(getUserId());
if(isUserLoggedIn() && !isAdmin()){
    $templateParams["js"][] = "js/logout.js";
}
require("template/base.php");
?>