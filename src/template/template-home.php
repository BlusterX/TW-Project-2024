<!-- SEZIONE OFFERTA DEL GIORNO -->
<header class="p-4 bg-dark">
            <div class="d-flex align-items-center justify-content-center flex-column flex-md-row text-center text-lg-start">
                <img src="<?php echo UPLOAD_DIR . "prova.png" ; ?>" alt="Offerta del giorno" class="img-fluid img-offert-custom"/>
                <div class="ms-lg-4 mt-3 mt-lg-0 offert-text-custom">
                    <h2 class="fw-bold ms-2">Offerta del giorno! Solo a 259,99€</h2>
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
                            <h4 class="card-title mt-3 card-text-custom"><?php echo $product["name"]; ?></h4>
                            <p class="card-text fw-bolder">€<?php echo $product["price"]; ?></p>
                            
                            <?php if ($product["stock"] > 0): ?>
                                <p class="card-text fw-bolder">Rimasti: <?php echo $product["stock"]; ?></p>
                                <a href="<?php echo isUserLoggedIn() ? 'add-to-cart.php?product_id=' . $product["id_product"]
                                    : 'login.php'; ?>" 
                                    class="btn fw-bold btn-custom">Aggiungi</a>
                            <?php else: ?>
                                <p class="text-danger fw-bold mt-3">Esaurito</p>
                                <button class="btn btn-secondary fw-bold" disabled>Non Disponibile</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>