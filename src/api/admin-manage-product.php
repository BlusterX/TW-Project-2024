<?php
require_once("../bootstrap.php");

if (!isUserLoggedIn() || !isset($_GET["action"])) {
    header("location: ../login.php");
} else if (!isAdmin()) {
    header("location: ../home.php");
}

switch($_GET["action"]) {
    case "add":
        list($result, $msg) = uploadImage("../" . UPLOAD_DIR, $_FILES["img"]);
        if(!$result) {
            exit("Errore caricamento immagine. $msg");
        }
        $dbh->insertProduct($_POST["name"], $_POST["price"],
            $_POST["description"], $msg, $_POST["stock"]);
        break;
    case "mod":
        $dbh->updateProduct( $_POST["name"], $_POST["price"], $_POST["discount"],
        $_POST["description"], $_POST["stock"], $_GET["id"]);
        header("location: ../admin.php");
        break;
    case "del":
        $productId = $_GET["id"];
        $dbh->updateDeletedProduct($productId);
        $users = $dbh->getUsersWithProductInCart($productId);
        $product = $dbh->getProductById($productId);
        $notificationMessage = "Un prodotto che avevi nel carrello è stato rimosso dal catalogo: ";
        $notificationTitle = "Prodotto nel carrello non più disponibile";
        foreach($users as $user) {
            $dbh->createNotification($user["id_user"], $notificationTitle, $notificationMessage . $product["name"]);
        }
        break;
}

header("location: ../admin.php");

?>