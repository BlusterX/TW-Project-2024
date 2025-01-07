<?php
require_once("bootstrap.php");

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(empty($login_result)){
        $templateParams["erroreLogin"] = "Credenziali non valide";
    } else {
        registerLoggedUser($login_result[0]);
    }
}

if (isUserLoggedIn()) {
    $templateParams["titolo"] = "Home";
    // $templateParams["nome"]
} else {
    $templateParams["titolo"] = "Login";
    // $templateParams["nome"]
}

?>