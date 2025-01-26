<!-- SEZIONE OFFERTA DEL GIORNO -->
<?php
if (!empty($templateParams["products_with_discount"])) {
    $maxDiscountProduct = array_reduce($templateParams["products_with_discount"], function ($carry, $product) {
        return ($carry === null || $carry["discount"] < $product["discount"]) ? $product : $carry;
    });
    $discountedPrice = $maxDiscountProduct["price"] - ($maxDiscountProduct["price"] * $maxDiscountProduct["discount"] / 100);
    $bestProduct = $maxDiscountProduct["img"];
    $bestDiscount = $maxDiscountProduct["discount"];
?>
    <header class="p-4 bg-dark">
        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row text-center text-lg-start">
            <img src="<?php echo UPLOAD_DIR . $bestProduct; ?>" alt="Offerta del giorno" class="img-fluid img-offert-custom" />
            <div class="ms-lg-4 mt-3 mt-lg-0 offert-text-custom">
                <h2 class="fw-bold ms-2">Offerta del giorno! Solo a <?php echo number_format($discountedPrice, 2); ?>€</h2>
                <h3 class="fs-4">Affrettatevi, sconto del <?php echo $bestDiscount; ?>%!</h3>
            </div>
        </div>
    </header>
<?php
}
?>
<!-- PRODOTTI -->
<div class="container my-4">
    <div class="row">
        <?php foreach ($templateParams["products"] as $product): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-custom text-white mb-4 shadow-lg">
                    <div class="card-body text-center">
                        <img class="img-card-custom" src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>" />
                        <h4 class="card-title mt-3 card-text-custom"><?php echo $product["name"]; ?></h4>
                        <?php
                        if ($product["discount"] > 0) {
                            $discountedPrice = $product["price"] - ($product["price"] * $product["discount"] / 100);
                        ?>
                            <p class="card-text text-decoration-line-through">€<?php echo $product["price"]; ?>
                            <?php if (!empty($product['description'])): ?>
                                <span class="bi bi-info-circle text-info" data-bs-toggle="tooltip" title="<?php echo $product['description']; ?>">
                                    <img class="img-fluid infopoint" src="<?php echo UPLOAD_DIR . "info.png"; ?>" alt="info of the product"/>
                            </span>
                            <?php endif; ?>
                            </p>
                            <p class="card-text fw-bolder fs-5">€<?php echo number_format($discountedPrice, 2); ?> (-<?php echo $product["discount"] ?>%)</p>
                            <?php } else { ?>
                                <p class="card-text">Prezzo attuale:</p>
                                <p class="card-text fw-bolder fs-5">
                                    €<?php echo $product["price"]; ?>
                                    <?php if (!empty($product['description'])): ?>
                                        <span class="bi bi-info-circle text-info" data-bs-toggle="tooltip" title="<?php echo $product['description']; ?>">
                                            <img class="img-fluid infopoint" src="<?php echo UPLOAD_DIR . "info.png"; ?>" alt="info of the product"/>
                                    </span>
                                    <?php endif; ?>
                                </p>
                                
                            <?php } ?>
                            <?php if ($product["stock"] > 0): ?>
                                <p class="card-text fw-bolder stock-count">Rimasti: <?php echo $product["stock"]; ?></p>
                                <a href="<?php echo isUserLoggedIn() ? '#' : 'login.php'; ?>"
                                    data-product-id="<?php echo $product["id_product"]; ?>"
                                    class="btn fw-bold btn-custom add-to-cart-btn">Aggiungi</a>
                            <?php else: ?>
                                <p class="text-danger fw-bold mt-3">Esaurito</p>
                                <button class="btn btn-secondary fw-bold" disabled>Non Disponibile</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>