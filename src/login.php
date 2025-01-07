<?php
require_once("bootstrap.php");

$templateParams["nome"] = "template-login.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result) == 0){
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
require("template/base.php");
?>