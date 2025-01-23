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
    <!-- Roboto font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column min-vh-100 p-0">
        <!-- NAVBAR -->
        <nav class="navbar navbar-custom">
            <div class="navbar-brand d-flex align-items-center ms-3">
                <a <?php isActive('home.php') ?> href="home.php">
                    <img src="<?php echo UPLOAD_DIR . "logo_prova.png"; ?>" alt="Logo" width="40" />
                </a>
                <h1 class="d-inline-block ms-2 mb-0">JS-COMMERCE</h1>
            </div>
            <div class="d-flex ms-auto me-4">
                <a <?php isActive('notifications.php') ?> href="notifications.php">
                    <span class="bi bi-bell"></span><span class="position-absolute 
                    translate-middle badge bg-success border border-light rounded-circle px-1 mt-1"><span 
                    class="visually-hidden">unread messages</span>
                    </span>
                    <img class="me-4 icon" src="<?php echo UPLOAD_DIR . "bell.png"; ?>" alt="Notifications" width="40" />
                </a>
                <?php if (isAdmin()): ?>
                    <a <?php isActive('admin.php'); ?> href="admin.php">
                        <img class="me-4 icon" src="<?php echo UPLOAD_DIR . "login.png"; ?>" alt="Login" width="40" />
                    </a>
                <?php elseif (isUserLoggedIn()): ?>
                    <div class="dropdown">
                        <a href="#" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="me-4 icon" src="<?php echo UPLOAD_DIR . "login.png"; ?>" alt="Login" width="40" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-center custom-dropdown" aria-labelledby="userMenu" style="border: 5px solid #ccc; border-radius: 10px; padding: 10px;">
                            <?php foreach (['name' => 'Nome', 'surname' => 'Cognome', 'username' => 'Username'] as $key => $label): ?>
                                <p><strong><?php echo $label; ?>:</strong> <?php echo $_SESSION[$key]; ?></p>
                            <?php endforeach; ?>
                            <a <?php isActive('your-orders.php'); ?> href="your-orders.php">
                                <button class="dropdown-item mouseover-custom">Riepilogo ordini</button>
                            </a>
                            <button class="dropdown-item logoutButton mouseover-custom">Logout</button>
                        </ul>
                    </div>
                <?php else: ?>
                    <a <?php isActive('login.php'); ?> href="login.php">
                        <img class="me-4 icon" src="<?php echo UPLOAD_DIR . "login.png"; ?>" alt="Login" width="40" />
                    </a>
                <?php endif; ?>
                <a <?php isActive('shopping.php'); ?> href="shopping.php">
                    <img class="icon" src="<?php echo UPLOAD_DIR . "shopping-cart.png"; ?>" alt="Shopping-cart" width="40" />
                </a>
            </div>
        </nav>
        <?php
        if (isset($templateParams["nome"])) {
            require($templateParams["nome"]);
        }
        ?>
        <!-- FOOTER -->
        <footer class="text-center text-white p-4 footer-custom w-100 mt-auto">
            <p class="mb-1">© 2025 JS-Commerce. Tutti i diritti riservati.</p>
            <p class="mb-0">Contatti: support@jscommerce.com</p>
            <p class="mb-0">Telefono: +39 123 456 7890</p>
        </footer>
    </div>
    <script src="../js/order-status.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
    ?>
        <script src="<?php echo $script; ?>"></script>
    <?php
        endforeach;
    endif;
    ?>
</body>

</html>