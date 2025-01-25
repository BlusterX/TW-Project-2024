<?php
require_once("../bootstrap.php");

if(!isUserLoggedIn() || !isset($_POST["product_id"])) {
    header("Location: ../login.php");
}

$productId = $_POST["product_id"];
$userId = getUserId();

if (!$dbh->isProductInCart($userId, $productId)) {
    exit("Prodotto non presente nel carrello");
} else {
    $quantity = $dbh->getCartQuantity($userId, $productId);
    $dbh->removeFromCart($userId, $productId);
    $productStock = $dbh->getProductStock($productId);
    $dbh->updateProductStock($productId, $productStock + $quantity);
}

header("Location: ../shopping.php");

?>