<header class="bg-dark text-white text-center py-3">
    <h1>Riepilogo Ordini</h1>
</header>
<main class="container my-4">
    <div class="accordion orderAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target=".collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                    Ordine 1
                </button>
            </h2>
            <div class="accordion-collapse collapse collapseOne1" aria-labelledby="headingOne1">
                <div class="accordion-body">
                    <div class="mb-2">Data effettuazione: 1/01/2021</div>
                    <div class="mb-2">Data spedizione: 1/01/2021</div>
                    <div class="mb-2">Orario effettuazione: 12:35:21</div>
                    <?php $num=0; foreach ($templateParams["products"] as $product): ?>
                    <div class="mb-2"><?php echo $num+=1 ?>° Prodotto: <?php echo $product["name"]; ?> x<?php echo $product["quantity"]; ?> </div>
                    <?php endforeach; ?>
                    Stato: <span class="badge bg-success">Completato</span>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion orderAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target=".collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                    Ordine 2
                </button>
            </h2>
            <div class="accordion-collapse collapse collapseOne2" aria-labelledby="headingOne2">
                <div class="accordion-body">
                    <div class="mb-2">Data effettuazione: 1/01/2021</div>
                    <div class="mb-2">Data spedizione: 1/01/2021</div>
                    <div class="mb-2">Orario effettuazione: 12:35:21</div>
                    <?php $num=0; foreach ($templateParams["products"] as $product): ?>
                    <div class="mb-2"><?php echo $num+=1 ?>° Prodotto: <?php echo $product["name"]; ?> x<?php echo $product["quantity"]; ?> </div>
                    <?php endforeach; ?>
                    Stato: <span class="badge bg-success">Completato</span>
                </div>
            </div>
        </div>
    </div>
</main>
