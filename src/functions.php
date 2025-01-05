<?php

function registerLoggedUser($user){
    $_SESSION["id_user"] = $user["id_user"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["nome"] = $user["nome"];
}

function isUserLoggedIn(){
    return !empty($_SESSION['id_user']);
}

?>