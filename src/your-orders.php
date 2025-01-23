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
    $admin_id = $dbh->getAdminId();
    $dbh->createNotification($admin_id, $notificationTitle, $notificationMessage);
    //Notifica per l'admin se un prodotto è esaurito
    $allProductSoldOut = $dbh->getProductSoldOut();
    foreach($products as $product) {
        foreach($allProductSoldOut as $productSoldOut) {
            if($product["id_product"] == $productSoldOut["id_product"]) {
                $notificationTitle = "Il prodotto " . $product["name"] . " è esaurito";
                $notificationMessage = "Il prodotto " . $product["name"] . " è esaurito bisogna fare rifornimento al più presto";
                $dbh->createNotification($admin_id, $notificationTitle, $notificationMessage);
            }
        }
    }
}

$templateParams["titolo"] = "I tuoi ordini";
$templateParams["nome"] = "template-your-orders.php";
$templateParams["orders"] = $dbh->getAllOrdersNewestFirst(getUserId());
$templateParams["js"] = array("js/order-status.js", "js/logout.js");
require("template/base.php");
?>