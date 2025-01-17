<!-- SEZIONE OFFERTA DEL GIORNO -->
<header class="p-4 offert-section-custom">
            <div class="d-flex align-items-center justify-content-center flex-column flex-md-row text-center text-lg-start">
                <img src="<?php echo UPLOAD_DIR . "prova.png" ; ?>" alt="Offerta del giorno" class="img-fluid img-offert-custom"/>
                <div class="ms-lg-4 mt-3 mt-lg-0">
                    <h2 class="fw-bold">Offerta del giorno! Solo a 259,99€</h2>
                    <p class="fs-4">Affrettatevi!</p>
                </div>
            </div>
        </header>
        <!-- PRODOTTI -->
        <main class="container my-4">
            <div class="row">
                <?php foreach ($templateParams["products"] as $product): ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-custom text-white mb-4">
                        <div class="card-body text-center">
                            <img class="img-card-custom" src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>"/>
                            <h4 class="card-title mt-3"><?php echo $product["name"]; ?></h5>
                            <p class="card-text fw-bolder">€<?php echo $product["price"]; ?></p>
                            <!-- TODO: aggiunta al carrello per utenti loggati al posto di # -->
                            <a href="<?php echo isUserLoggedIn() ? 'add-to-cart.php?product_id=' . $product["id_product"]
                                : 'login.php' ?>" class="btn btn-warning fw-bold">Aggiungi</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>