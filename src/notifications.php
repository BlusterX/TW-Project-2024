<?php
require_once("bootstrap.php");

if (!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["titolo"] = "Notifications";
$templateParams["nome"] = "template-notifications.php";
$id_user = getUserId();
$templateParams["notifiche"] = $dbh->getUserNotifications($id_user);
$templateParams["js"] = array("js/logout.js");
require("template/base.php");
?>