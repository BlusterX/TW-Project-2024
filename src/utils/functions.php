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
    $_SESSION["surname"] = $user["surname"];
    $_SESSION["is_admin"] = $user["is_admin"];
}

function isUserLoggedIn(){
    return !empty($_SESSION['id_user']);
}

function isAdmin() {
    return isUserLoggedIn() && $_SESSION['is_admin'];
}

function getUserId(){
    if(!isUserLoggedIn()){
        exit("User not logged in");
    }
    return $_SESSION["id_user"];
}

/* 
Loads an image from the specified path; returns an array where the first element is the result
(0 error, 1 success) and the second element is the error message or the image itself
*/
function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    
    // Check if it's actually an image
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    // Check dimension (max 500KB)
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    // Check file extension
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    // Check if file name already exists, if so rename it
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    // If there are no errors, move the file from the temporary location to the destination folder
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore relativo alla directory.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function formatDate($date){
    return date("d/m/Y H:i:s", strtotime($date));
}

?>