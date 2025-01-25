<?php
require_once("../bootstrap.php");
header('Content-Type: application/json');

if (!isUserLoggedIn()) {
    echo json_encode(["success" => false, "message" => "Utente non loggato."]);
    exit();
}
if (!isset($_POST["product_id"])) {
    echo json_encode(["success" => false, "message" => "Informazioni sull'ID del prodotto mancanti."]);
    exit();
}

$productId = $_POST["product_id"];
$userId = getUserId();

try {
    $productStock = $dbh->getProductStock($productId);

    if ($productStock < 1) {
        echo json_encode(["success" => false, "message" => "Prodotto non disponibile."]);
        exit();
    }

    if ($dbh->isProductInCart($userId, $productId)) {
        $quantity = $dbh->getCartQuantity($userId, $productId);
        $dbh->updateCartQuantity($userId, $productId, $quantity + 1);
    } else {
        $dbh->addProductToCart($userId, $productId, 1);
    }

    $newStock = $productStock - 1;
    $dbh->updateProductStock($productId, $newStock);

    echo json_encode(["success" => true, "remainingStock" => $newStock, "message" => "Prodotto aggiunto al carrello."]);
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "remainingStock" => $newStock,
        "error" => "Errore durante l\'aggiunta al carrello: " . $e->getMessage()
    ]);
}

?>
