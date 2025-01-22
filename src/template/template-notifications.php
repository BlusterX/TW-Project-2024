<header class="bg-dark text-white text-center py-3">
    <h1>Notifiche</h1>
</header>
<?php if (empty($templateParams["notifiche"])) { ?>
    <h1 class="text-center pt-4">Non ci sono notifiche</h1>
<?php } else { ?>
    <?php
    foreach ($templateParams["notifiche"] as $notifica):
        $codNotifica = $notifica["id_notification"];
        $testoNotifica = $notifica["message"];
        ?>
<main class="container my-4">
    <div class="accordion" id="notificationsAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="successNotification">
                <button class="accordion-button text-success fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSuccess" aria-expanded="false" aria-controls="collapseSuccess">
                    <strong class="me-2">#<?php echo $codNotifica; ?></strong>
                    Ordine arrivato a destinazione
                </button>
            </h2>
            <div id="collapseSuccess" class="accordion-collapse collapse" aria-labelledby="successNotification" data-bs-parent="#notificationsAccordion">
                <div class="accordion-body">
                    <?php echo $testoNotifica; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php endforeach;
} ?>