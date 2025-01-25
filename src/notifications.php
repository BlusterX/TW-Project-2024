<?php
require_once("bootstrap.php");

if (!isUserLoggedIn()) {
    header("Location: login.php");
}

$templateParams["title"] = "Notifiche";
$templateParams["name"] = "template-notifications.php";
$id_user = getUserId();
$templateParams["notifiche"] = $dbh->getUserNotifications($id_user);
$templateParams["js"] = array("js/notification-status.js");
if(isUserLoggedIn() && !isAdmin()){
    $templateParams["js"][] = "js/logout.js";
}
require("template/base.php");
?>