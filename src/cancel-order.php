<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
}
if(!isset($_GET["order_id"])) {
    exit("Errore: informazioni relative all'ordine mancanti");
}

$orderId = $_GET["order_id"];

$products = $dbh->getOrderedProducts($orderId);
// Revert product stocks
foreach($products as $product) {
    $productId = $product["product_id"];
    $quantity = $product["quantity"];
    $productStock = $dbh->getProductStock($productId);
    $dbh->updateProductStock($productId, $productStock + $quantity);
}
$dbh->deleteOrder($orderId);


header("home.php");

?>