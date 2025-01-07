<!doctype html>
<html lang="it">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JS-Commerce<?php
    if (isset($templateParams["titolo"])) {
        echo " - " . "$templateParams[titolo]";
    }
    ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container-fluid p-0">
        <!-- NAVBAR -->
        <nav class="navbar" style="background-color: #bd0000;">
            <div class="navbar-brand d-flex align-items-center ms-3">
                <img src="<?php echo UPLOAD_DIR . "logo_prova.png"; ?>" alt="Logo" width="50"/>
                <h1 class="d-inline-block ms-2 mb-0">JS-COMMERCE</h1>
            </div>
            <div class="d-flex ms-auto me-4">
                <a <?php isActive('login.php'); ?> href="login.php">
                    <img class="me-4" src="<?php echo UPLOAD_DIR . "login.png";?>" alt="Login" width="40"/>
                </a>
                <a href="">
                    <img src="<?php echo UPLOAD_DIR . "shopping-cart.png" ; ?>" alt="Shopping-cart" width="40"/>
                </a>
            </div>
        </nav>
        <?php
        if(isset($templateParams["nome"])){
            require($templateParams["nome"]);
        }
        ?>
        <!-- FOOTER -->
        <footer class="text-center text-white p-4" style="background-color: #bd0000;">
            <p class="mb-1">© 2025 JS-Commerce. Tutti i diritti riservati.</p>
            <p class="mb-0">Contatti: support@jscommerce.com - Telefono: +39 123 456 7890</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>