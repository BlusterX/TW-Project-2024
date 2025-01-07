<?php

function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function registerLoggedUser($user){
    $_SESSION["id_user"] = $user["id_user"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["is_admin"] = $user["is_admin"];
}

function isUserLoggedIn(){
    return !empty($_SESSION['id_user']);
}

function isAdmin() {
    return isUserLoggedIn() && $_SESSION['is_admin'];
}

?>