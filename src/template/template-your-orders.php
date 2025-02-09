<header class="bg-dark text-white text-center py-2 pt-4">
    <h1>Riepilogo Ordini</h1>
</header>
<div class="container my-4">
    <div class="accordion orderAccordion">
        <?php foreach ($templateParams["orders"] as $order):
            $orderDate = formatDate($order["date"]);
            $shippingDate = formatDate($order["date_shipping"]);
            $products = $dbh->getOriginalOrderProducts($order["id_order"]); ?>

            <div class="accordion-item" data-order-id="<?php echo $order['id_order']; ?>">
                <p class="accordion-header fs-5">
                    <button class="accordion-button collapsed" type="button" aria-expanded="false">
                        Ordine #<?php echo $order["id_order"]; ?>
                    </button>
                </p>
                <div class="accordion-collapse collapse accordion-custom">
                    <div class="accordion-body">
                        <div class="mb-2">Data effettuazione: <?php echo $orderDate ?></div>
                        <div class="mb-2">Data spedizione:
                            <span class="shipping-date" data-date="<?php echo $order['date_shipping']; ?>">
                                <?php echo $shippingDate ?>
                            </span>
                        </div>
                        Stato:
                        <?php if ($order["is_delivered"]) { ?>
                            <span class="badge bg-success status-badge">Consegnato</span>
                        <?php } else { ?>
                            <span class="badge bg-warning status-badge">In elaborazione</span>
                        <?php } ?>
                        <p class="mt-3">Prodotti:</p>
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <div class="d-flex align-items-center mb-3">
                                    <?php
                                    $quantity = $product["quantity"];
                                    $finalPrice = number_format($product["price"] * (1 - $product["discount"] / 100) * $quantity, 2, '.', '');
                                    ?>
                                    <img class="img-your-order" src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>" />
                                    <span><?php echo $product["name"]; ?> x<?php echo $quantity; ?> (€<?php echo $finalPrice; ?>)</span>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Non ci sono prodotti in questo ordine.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>