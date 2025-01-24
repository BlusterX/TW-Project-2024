<?php
require_once("bootstrap.php");

header("Content-Type: application/json");

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit();
}
if (!isset($_POST["notification_id"])) {
    echo json_encode(["success" => false, "message" => "Informazioni sull'ID della notifica mancanti."]);
    exit();
}

$notificationId = $_POST["notification_id"];
$notification = $dbh->getNotificationById($notificationId);

if(!$notification["is_read"]) {
    if ($dbh->markNotificationAsRead($notificationId)) {
        echo json_encode(["success" => true, "message" => "Stato notifica cambiato a 'letta'."]);
    } else {
        echo json_encode(["success" => false, "error" => "Errore nell'aggiornamento del database"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "La notifica è già stata letta."]);
}

?>
