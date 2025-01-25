<?php
require_once("bootstrap.php");

header("Content-Type: application/json");

if (!isUserLoggedIn()) {
    echo json_encode(["success" => false, "message" => "Utente non loggato."]);
    exit();
}

try {
    $cartCount = $dbh->getCartItemsCount(getUserId());
    echo json_encode(["success" => true, "cartCount" => $cartCount]);
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "Errore durante il recupero del numero di prodotti nel carrello."
    ]);
}

?>