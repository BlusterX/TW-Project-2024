<?php
require_once("../bootstrap.php");

header("Content-Type: application/json");

if (!isUserLoggedIn()) {
    echo json_encode(["success" => false, "message" => "Utente non loggato."]);
    exit();
}

try {
    $unreadNotifications = $dbh->getUserUnreadNotifications(getUserId());
    echo json_encode(["success" => true, "unreadNotifications" => $unreadNotifications]);
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "Errore durante il recupero delle notifiche."
    ]);
}

exit();
