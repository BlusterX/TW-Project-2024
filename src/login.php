<?php
require_once("bootstrap.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = $dbh->getUserByEmail($email);

    // Check if the user exists and the password matches the encrypted one
    if(empty($user) || !password_verify($password, $user[0]["password"])) {
        $templateParams["erroreLogin"] = "Credenziali non valide";
    } else {
        registerLoggedUser($user[0]);
        header("Location: home.php");
    }
}

$templateParams["nome"] = "template-login.php";

if (isUserLoggedIn()) {
    $templateParams["titolo"] = "Home";
    // $templateParams["nome"]
} else {
    $templateParams["titolo"] = "Login";
    // $templateParams["nome"]
}
require("template/base.php");
?>