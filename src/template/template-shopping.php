<!-- CONTENUTO PRINCIPALE -->
        <main class="container py-4">
            <!-- Intestazione colonne -->
            <div class="row mb-2">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-between px-5">
                    <span class="fw-bold">Prodotto</span>
                    <span class="fw-bold">Quantità</span>
                    <span class="fw-bold">Prezzo</span>
                    <span class="fw-bold"></span>
                </div>
            </div>
            <?php
            $tot = 0;
            foreach ($templateParams["products"] as $product):
            ?>
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
                            <input type="number" class="form-control text-center" style="width:60px;"
                                value=<?php echo $product["quantity"]; ?> min="1" readonly/>
                        </div>
                        <!-- Prezzo -->
                        <span class="fs-5">€<?php echo $product["price"] * $product["quantity"]; ?></span>
                        <!-- Pulsante Rimuovi -->
                        <form method="POST" action="remove-from-cart.php" class="d-inline">
                            <input type="hidden" name="product_id" value="<?php echo $product["id_product"]; ?>"/>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>Rimuovi</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php 
            $tot += $product["price"] * $product["quantity"];
            endforeach;
            ?>
            
            <!-- TOTALE -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-end">
                    <span class="fw-bold fs-5 me-2">TOTALE:</span>
                    <span class="fs-5 fw-bold">€<?php echo $tot; ?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-center">
                    <a href="summary-order.php">
                        <button type="submit" class="btn btn-success btn-lg">Completa acquisto</button>
                    </a>
                </div>
            </div>
        </main>