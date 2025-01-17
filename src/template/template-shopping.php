<!-- CONTENUTO PRINCIPALE -->
        <main class="container py-4">
            <!-- Intestazione colonne -->
            <div class="row mb-2">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-between px-5">
                    <span class="fw-bold">Prodotto</span>
                    <span class="fw-bold">Quantità</span>
                    <span class="fw-bold">Prezzo</span>
                </div>
            </div>
            <?php foreach ($templateParams["products"] as $product): ?>
            <div class="row mb-3">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="d-flex align-items-center justify-content-between p-4" style="background-color: #999; border-radius: 10px;">
                        <!-- Immagine + nome -->
                        <div class="d-flex flex-column align-items-center">
                            <img class="img-card-custom" src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>"/>
                            <span class="mt-2 fw-bold"><?php echo $product["name"]; ?></span>
                        </div>
                        <div class="pe-4">
                            <!-- Quantità -->
                            <input type="number" class="form-control text-center" style="width:60px;" value="1" min="1"/>
                        </div>
                        <!-- Prezzo -->
                        <span class="fs-5">€<?php echo $product["price"]; ?></span>
                    </div>
                </div>
            </div>
            
            <!-- TOTALE -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-end">
                    <span class="fw-bold fs-5 me-2">TOTALE:</span>
                    <span class="fs-5 fw-bold">€<?php $tot = $tot+$product["price"]; echo $tot; ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </main>