<header class="bg-dark text-white text-center py-3">
    <h1>Notifiche</h1>
</header>
<main class="container my-4">
    <div class="accordion" id="notificationsAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="successNotification">
                <button class="accordion-button text-success fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSuccess" aria-expanded="false" aria-controls="collapseSuccess">
                    Ordine arrivato a destinazione
                </button>
            </h2>
            <div id="collapseSuccess" class="accordion-collapse collapse" aria-labelledby="successNotification" data-bs-parent="#notificationsAccordion">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure voluptates odit voluptatem voluptate eveniet sit ab deserunt corrupti possimus incidunt minima fuga soluta ratione impedit ullam qui illo, reiciendis officiis.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="errorNotification">
                <button class="accordion-button text-danger fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseError" aria-expanded="false" aria-controls="collapseError">
                    Pagamento effettuato - ordine in spedizione
                </button>
            </h2>
            <div id="collapseError" class="accordion-collapse collapse" aria-labelledby="errorNotification" data-bs-parent="#notificationsAccordion">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga alias dicta ratione repellendus ab quaerat, numquam labore quia nobis. Illum nisi dolorum quod dolores sit aspernatur magni ratione nam ex!
                </div>
            </div>
        </div>
    </div>
</main>