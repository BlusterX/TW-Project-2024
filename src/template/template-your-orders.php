<header class="bg-dark text-white text-center py-3">
    <h1>Riepilogo Ordini</h1>
</header>
<main class="container my-4">
    <div class="accordion orderAccordion">
        <?php foreach ($templateParams["orders"] as $order):
            $orderDate = formatDate($order["date"]);
            $shippingDate = formatDate($order["date_shipping"]);
            $products = $dbh->getOrderedProducts($order["id_order"]); ?>
            <div class="accordion-item" data-order-id="<?php echo $order['id_order']; ?>">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo $order['id_order']; ?>"
                        aria-expanded="false" aria-controls="collapse<?php echo $order["id_order"]; ?>">
                        Ordine #<?php echo $order["id_order"]; ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $order['id_order']; ?>" class="accordion-collapse collapse"
                    aria-labelledby="heading<?php echo $order["id_order"]; ?>">
                    <div class="accordion-body">
                        <div class="mb-2">Data effettuazione: <?php echo $orderDate ?></div>
                        <div class="mb-2">Data spedizione:
                            <span class="shipping-date" data-date="<?php echo $order['date_shipping']; ?>">
                                <?php echo $shippingDate ?>
                            </span>
                        </div>
                        <!-- Default state -->
                        Stato: <span class="badge bg-warning status-badge">In elaborazione</span>
                        <h5 class="mt-3">Prodotti:</h5>
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>" style="width: 80px; height: auto; object-fit: cover; margin-right: 10px;">
                                    <span><?php echo $product["name"]; ?> x<?php echo $product["quantity"]; ?> (€<?php echo $product["price"]; ?>)</span>
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
</main>