<header class="bg-dark text-white text-center py-2 pt-4">
    <h1>Riepilogo Ordine</h1>
</header>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Dettagli ordine
                </div>
                <div class="card-body">
                    <?php
                    $tot = 0;
                    $num_prod = 0;
                    foreach ($templateParams["products"] as $product): ?>
                        <?php
                        $discountPrice = number_format($product["price"] * (1 - $product["discount"] / 100), 2, '.', '');
                        ?>
                        <p class="card-text"><strong><?php echo ++$num_prod; ?>° Prodotto:</strong> <?php echo $product["name"]; ?> (€<?php echo number_format($discountPrice, 2, '.', ''); ?>) x<?php echo $product["quantity"]; ?></p>
                    <?php
                        $tot += $discountPrice * $product["quantity"];
                    endforeach; ?>
                    <p class="card-text"><strong>Prezzo totale:</strong> €<?php echo number_format($tot,2, '.', ''); ?></p>
                </div>
            </div>
            <div class="text-center my-3">
                <a href="api/generate-order.php?cart_id=<?php echo $templateParams["cart_id"]; ?>">
                    <button class="btn btn-success btn-lg w-100 mb-3">Paga ora</button>
                </a>
                <a href="home.php">
                    <button class="btn btn-danger btn-lg w-100">Annulla ordine</button>
                </a>
            </div>
        </div>
    </div>
</div>