<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}
if(!isset($_GET["cart_id"])) {
    exit("Errore: informazioni relative al carrello mancanti");
}

$userId = getUserId();
$cartId = $_GET["cart_id"];
$products = $dbh->getCartProducts($userId);

$orderId = $dbh->createOrder($userId);
foreach($products as $product) {
    $productId = $product["id_product"];
    $price = $product["price"];
    $quantity = $product["quantity"];

    $dbh->addProductToOrder($orderId, $productId, $quantity, $price);
    $dbh->removeFromCart($userId, $productId);
}

header("Location: order.php?order_id=" . $orderId);
?>