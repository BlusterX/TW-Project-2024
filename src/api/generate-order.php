<?php
require_once("../bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: ../login.php");
}
if(!isset($_GET["cart_id"])) {
    exit("Errore: informazioni relative al carrello mancanti");
}

$userId = getUserId();
$cartId = $_GET["cart_id"];
$products = $dbh->getCartProducts($userId);
$notificationMessage = "Prodotti ordinati:";
$orderId = $dbh->createOrder($userId);
$dbh->generateShippingDate($orderId); // Assign the shipping date

foreach($products as $product) {
    $productId = $product["id_product"];
    $price = $product["price"];
    $quantity = $product["quantity"];
    $discount = $product["discount"];
    $notificationMessage .= "<br/>" . $product["name"] . " x" . $product["quantity"];

    $dbh->addProductToOrder($orderId, $productId, $quantity, $price, $discount);
    $dbh->removeFromCart($userId, $productId);
}

// Notify the user that the order has been confirmed
$notificationTitle = "L'ordine #" . $orderId . " è in spedizione";
$dbh->createNotification(getUserId(), $notificationTitle, $notificationMessage);

// Notify the admin that a user has placed the order
$username = $dbh->getUsernameById(getUserId());
$notificationTitle = "L'ordine #" . $orderId . " è stato effettuato da " . $username;
$idAdmin = $dbh->getAdminId(); // The site has only one admin
$dbh->createNotification($idAdmin, $notificationTitle, $notificationMessage);

// Notify the admin if a product is no longer available
$allProductSoldOut = $dbh->getProductSoldOut();
foreach($products as $product) {
    foreach($allProductSoldOut as $productSoldOut) {
        if($product["id_product"] == $productSoldOut["id_product"]) {
            $notificationTitle = "Il prodotto " . $product["name"] . " è esaurito";
            $notificationMessage = "Gli stock di " . $product["name"] . " sono terminati.";
            $dbh->createNotification($idAdmin, $notificationTitle, $notificationMessage);
        }
    }
}

header("Location: ../your-orders.php");
?>