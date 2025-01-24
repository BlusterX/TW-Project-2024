<!-- CONTENUTO PRINCIPALE -->
<?php
    if($templateParams["products"] == NULL){
        echo "<h1 class='text-center pt-3'>Il carrello è vuoto</h1>";
    }
    else{
?>       
        <main class="container py-4">
            <!-- Intestazione colonne -->
            <div class="row mb-2">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-between px-5">
                    <span class="fw-bold col-3">Prodotto</span>
                    <span class="fw-bold col-3 text-center">Quantità</span>
                    <span class="fw-bold col-3 text-center">Prezzo</span>
                    <span class="fw-bold col-3 text-center"></span>
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
                        <div class="d-flex flex-column align-items-center col-3">
                            <img class="img-card-custom icon" src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>"/>
                            <span class="mt-2 fw-bold fs-6"><?php echo $product["name"]; ?></span>
                        </div>
                        <div class="pe-4 col-3 text-center">
                            <!-- Quantità -->
                            <span class="fw-bold bg-white px-2 rounded"><?php echo $product["quantity"]; ?></span>
                        </div>
                        <!-- Prezzo -->
                        <?php 
                        $discountPrice = number_format($product["price"] * (1 - $product["discount"] / 100), 2, '.', '');
                        $totalPrice = number_format($discountPrice * $product["quantity"], 2, '.', ''); ?>
                        <span class="fs-5 col-3 text-center">€<?php echo $totalPrice; ?></span>
                         
                        <!-- Pulsante Rimuovi -->
                        <form method="POST" action="remove-from-cart.php" class="d-inline col-3 text-center">
                            <input type="hidden" name="product_id" value="<?php echo $product["id_product"]; ?>"/>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>Rimuovi</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php 
            $tot += $totalPrice;
            endforeach;
            ?>
            
            <!-- TOTALE -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-end">
                    <span class="fw-bold fs-5 me-2">TOTALE:</span>
                    <span class="fs-5 fw-bold">€<?php echo $tot; ?></span>
                </div>
            </div>
            <?php if($tot != 0){ ?>
            <div class="row mb-3">
                <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-center">
                    <a href="generate-order.php?cart_id=<?php echo $templateParams['cart_id']; ?>">
                        <button type="submit" class="btn btn-success btn-lg">Completa acquisto</button>
                    </a>
                </div>
            </div>
            <?php } ?>
        </main>
<?php } ?>