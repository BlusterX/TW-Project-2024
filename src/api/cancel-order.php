<?php
require_once("../bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: ../login.php");
}
if(!isset($_GET["order_id"])) {
    exit("Errore: informazioni relative all'ordine mancanti");
}

$orderId = $_GET["order_id"];

$products = $dbh->getOrderedProducts($orderId);
// Revert product stocks
foreach($products as $product) {
    $productId = $product["id_product"];
    $quantity = $product["quantity"];
    $productStock = $dbh->getProductStock($productId);
    $dbh->updateProductStock($productId, $productStock + $quantity);
}

$dbh->deleteOrderedProducts($orderId); // Remove all instances of ordered products
$dbh->deleteOrder($orderId);

header("Location: ../home.php");
?>