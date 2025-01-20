<?php
require_once("bootstrap.php");

if (!isUserLoggedIn() || !isset($_GET["action"])) {
    header("location: login.php");
} else if (!isAdmin()) {
    header("location: home.php");
}

switch($_GET["action"]) {
    case "add":
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["img"]);
        if(!$result) {
            exit("Errore caricamento immagine. $msg");
        }
        $dbh->insertProduct($_POST["name"], $_POST["price"],
            $_POST["description"], $msg, $_POST["stock"]);
        break;
    case "mod":
        $dbh->updateProduct( $_POST["name"], $_POST["price"],
        $_POST["description"], $_POST["stock"], $_GET["id"]);
        header("location: admin.php");
        break;
    case "del":
        $productId = $_GET["id"];
        $dbh->removeFromAllCarts($productId);
        $dbh->deleteProduct($productId);
        break;
}

header("location: admin.php");

?>