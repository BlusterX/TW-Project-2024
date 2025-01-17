<?php
require_once("bootstrap.php");

if(!isUserLoggedIn() || !isset($_GET["product_id"])) {
    header("Location: login.php");
}

$productId = $_GET["product_id"];
$productStock = $dbh->getProductStock($productId);
$userId = getUserId();

if($productStock < 1) {
    exit("Prodotto non disponibile");
}

if($dbh->isProductInCart($userId, $productId)) {
    $quantity = $dbh->getCartQuantity($userId, $productId);
    $dbh->updateCartQuantity($userId, $productId, $quantity + 1);
} else {
    $dbh->addProductToCart($userId, $productId, 1);
}
$dbh->updateProductStock($productId, $productStock - 1);

header("Location: home.php");

?>