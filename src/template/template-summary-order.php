<header class="bg-dark text-white text-center py-3">
    <h1>Riepilogo Ordine</h1>
</header>
<main class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Ordine 1
                </div>
                <div class="card-body">
                    <?php 
                    $tot = 0;
                    $num_prod=0;
                    foreach ($templateParams["products"] as $product): ?>
                    <p class="card-text"><strong><?php echo ++$num_prod; ?>° Prodotto:</strong> <?php echo $product["name"]; ?> x<?php echo $product["quantity"]; ?> (€<?php echo $product["price"]*$product["quantity"]; ?>)</p>
                    <?php
                    $tot += $product["price"] * $product["quantity"];
                    endforeach; ?>
                    <p class="card-text"><strong>Prezzo totale:</strong> €<?php echo $tot; ?></p>
                </div>
            </div>
            <div class="text-center my-3">
                <button class="btn btn-success btn-lg w-100 mb-3">Paga ora</button>
                <button class="btn btn-danger btn-lg w-100">Annulla ordine</button>
            </div>
        </div>
    </div>
</main>
