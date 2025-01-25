<header class="bg-dark text-white text-center py-3">
    <h1>Notifiche</h1>
</header>
<?php if (empty($templateParams["notifiche"])) { ?>
    <h1 class="text-center pt-4">Non ci sono notifiche</h1>
<?php } else { ?>
<div class="container py-4">
    <?php
        foreach ($templateParams["notifiche"] as $notifica):
        $codNotifica = $notifica["id_notification"];
        $accordionId = "collapseSuccess" . $codNotifica;
        $headerId = "successNotification" . $codNotifica;
    ?>
    <div class="accordion" id="notificationsAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="<?php echo $headerId; ?>">
                <button class="accordion-button <?php echo $notifica["is_read"] ? "text-success" : "text-warning" ?> fw-bold collapsed" type="button"
                    data-id="<?php echo $codNotifica; ?>" data-bs-toggle="collapse" data-bs-target="#<?php echo $accordionId; ?>"
                    aria-expanded="false" aria-controls="<?php echo $accordionId; ?>">
                    <?php echo $notifica["title"]; ?>
                </button>
            </h2>
            <div id="<?php echo $accordionId; ?>" class="accordion-collapse collapse"
                aria-labelledby="<?php echo $headerId; ?>" data-bs-parent="#notificationsAccordion">
                <div class="accordion-body">
                    <?php echo $notifica["message"]; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;
    } ?>
</div>
