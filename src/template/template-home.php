<!-- SEZIONE OFFERTA DEL GIORNO -->
<header class="p-4" style="background-color: #fce948;">
            <div class="d-flex align-items-center justify-content-center flex-column flex-md-row text-center text-lg-start">
                <img src="<?php echo UPLOAD_DIR . "prova.png" ; ?>" alt="Offerta del giorno" class="img-fluid" style="max-height: 100px; max-height: 200px;">
                <div class="ms-lg-4 mt-3 mt-lg-0">
                    <h2 class="fw-bold">Offerta del giorno! Solo a 259,99€</h2>
                    <p class="fs-4">Affrettatevi!</p>
                </div>
            </div>
        </header>
        <!-- PRODOTTI -->
        <main class="container my-4">
            <div class="row">
                <!-- CARD 1 -->
                <?php foreach ($templateParams["products"] as $product): ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-white mb-4" style="background-color: #bd0000;">
                        <div class="card-body text-center">
                            <img src="<?php echo UPLOAD_DIR . "prova.png" ; ?>" alt="<?php echo $product["name"]; ?>" style="max-width: 150px;"/>
                            <h4 class="card-title mt-3"><?php echo $product["name"]; ?></h5>
                            <p class="card-text fw-bolder">€<?php echo $product["price"]; ?></p>
                            <a href="#" class="btn btn-warning fw-bold">Aggiungi</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>