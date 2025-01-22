<?php
require_once("bootstrap.php");

if (!isUserLoggedIn()) {
    header("Location: login.php");
    exit();
}

$templateParams["titolo"] = "Notifications";
$templateParams["nome"] = "template-notifications.php";
$id_user = getUserId();
$templateParams["notifiche"] = $dbh->getUserNotifications($id_user);

require("template/base.php");
?>