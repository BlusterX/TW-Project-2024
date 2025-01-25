<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}

if(isset($_GET["order_id"])) {
    $idOrder = $_GET["order_id"];
    $dbh->generateShippingDate($idOrder);
    //Notifica per l'utente
    $notificationTitle = "L'ordine #" . $idOrder . " è in spedizione";
    $products = $dbh->getOrderedProducts($idOrder);

    $notificationMessage = "Prodotti ordinati:";
    foreach($products as $product) {
        $notificationMessage .= "<br/>" . $product["name"] . " x" . $product["quantity"];
    }
    $dbh->createNotification(getUserId(), $notificationTitle, $notificationMessage);

    //Notifica per l'admin della conferma dell'acquisto
    $username = $dbh->getUsernameById(getUserId());
    $notificationTitle = "L'ordine #" . $idOrder . " è stato effettuato da " . $username;
    $admin_id = $dbh->getAdminId(); // The site has only one admin
    $dbh->createNotification($admin_id, $notificationTitle, $notificationMessage);

    //Notifica per l'admin se un prodotto è esaurito
    $allProductSoldOut = $dbh->getProductSoldOut();
    foreach($products as $product) {
        foreach($allProductSoldOut as $productSoldOut) {
            if($product["id_product"] == $productSoldOut["id_product"]) {
                $notificationTitle = "Il prodotto " . $product["name"] . " è esaurito";
                $notificationMessage = "Gli stock di " . $product["name"] . " sono terminati.";
                $dbh->createNotification($admin_id, $notificationTitle, $notificationMessage);
            }
        }
    }

    // Redirect to the same page clearing $_GET to avoid resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
}

$templateParams["title"] = "I tuoi ordini";
$templateParams["name"] = "template-your-orders.php";
$templateParams["orders"] = $dbh->getAllOrdersNewestFirst(getUserId());
$templateParams["js"] = array("js/order-status.js", "js/logout.js", "js/show-orders.js");
require("template/base.php");
?>