<?php
require_once("bootstrap.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = $dbh->getUserByEmail($email);
    $invalidCredentials = empty($user) || !password_verify($password, $user[0]["password"]);

    // Check if the user exists and the password matches the encrypted one
    if ($invalidCredentials) {
        $templateParams["erroreLogin"] = "Credenziali non valide";
    } else {
        registerLoggedUser($user[0]);
        if(isAdmin()) {
            header("Location: admin.php");
        } else {
            header("Location: home.php");
        }
    }
}
$templateParams["titolo"] = "Login";
$templateParams["nome"] = "template-login.php";

// If the user is already logged in, redirect to the home page
// TODO: profile page?
/*if (isUserLoggedIn()) {
    header("Location: home.php");
}*/

require("template/base.php");
?>