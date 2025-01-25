<?php
require_once("bootstrap.php");

$templateParams["title"] = "Home";
$templateParams["name"] = "template-home.php";
$templateParams["products"] = $dbh->getAllProducts();
$templateParams["products_with_discount"] = $dbh->getProductWithDiscount();
$templateParams["js"] = array("js/tooltip.js");

if(isUserLoggedIn()){
    $templateParams["js"][] = "js/list-update.js";
    if(!isAdmin()) {
        $templateParams["js"][] = "js/logout.js";
    }
}

require("template/base.php");
?>