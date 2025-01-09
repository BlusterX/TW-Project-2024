<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Check if the email format is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $templateParams["erroreSignup"] = "Formato email non valido";
        } elseif(!empty($dbh->getUserByUsername($username))) {
            $templateParams["erroreSignup"] = "Username già in uso";
        } else {
            // Check if the email is already in use
            if(!empty($dbh->getUserByEmail($email))) {
                $templateParams["erroreSignup"] = "Email già in uso";
            } else {
                $dbh->insertUser($username, $email, $pw_hash, $name, $surname);
                $user = $dbh->getUserByEmail($email);
                registerLoggedUser($user[0]);
                header("Location: home.php");
            }
        }
    }
    else{
        $templateParams["erroreSignup"] = "Tutti i campi sono obbligatori";
    }
}

$templateParams["titolo"] = "Registrazione";
$templateParams["nome"] = "template-signup.php";
require("template/base.php");

?>