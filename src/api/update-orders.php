<?php
require_once("../bootstrap.php");

header("Content-Type: application/json");

if (!isUserLoggedIn()) {
    echo json_encode(["success" => false, "message" => "Utente non loggato."]);
    exit();
}

$undeliveredOrders = $dbh->getUndeliveredOrders(getUserId());
$updatedOrders = [];

foreach ($undeliveredOrders as $order) {
    $orderId = $order["id_order"];
    $shippingDate = $order["date_shipping"];
    $currentDate = date("Y-m-d H:i:s");

    // Check must be made after order is confirmed (so shipping date is assigned)
    if ($shippingDate != null && $currentDate >= $shippingDate) {
        $dbh->setAsDelivered($orderId);
        $notificationTitle = "L'ordine #" . $orderId . " è stato consegnato";
        $notificationMessage = "I prodotti sono stati consegnati con successo.<br/>Grazie "
            . $_SESSION["name"] . " per aver acquistato da noi!";
        $dbh->createNotification(getUserId(), $notificationTitle, $notificationMessage);
        $updatedOrders[] = $orderId; // Add the order ID to the list if its status was updated
    }
}

echo json_encode(["success" => true, "updatedOrders" => $updatedOrders]);
