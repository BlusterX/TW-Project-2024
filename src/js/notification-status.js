function addClickListener(button) {
    button.addEventListener("click", () => {
        // If the notification is already read, do nothing
        if (button.classList.contains("text-success")) {
            return;
        }

        const notificationId = button.getAttribute("data-id");
        const url = "api/update-notification.php";
        const formData = new FormData();
        formData.append("notification_id", notificationId);
        fetch(url, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    button.classList.remove("text-warning");
                    button.classList.add("text-success");
                } else {
                    console.error("Errore durante l'aggiornamento della notifica: ", data.error);
                }
            })
            .catch((error) => {
                console.error("Errore nella richiesta AJAX: ", error);
            });
    });
}

function updateNotificationsList() {
    const notificationsContainer = document.getElementById("notificationsAccordion");
    const url = "api/check-notifications.php";
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Errore nel recupero delle notifiche.");
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                const unreadNotifications = data.unreadNotifications;

                unreadNotifications.forEach((notification) => {
                    const notificationId = notification.id_notification;
                    // Check if the notification already exists in the list
                    if (document.getElementById(`collapseSuccess${notificationId}`) == null) {
                        const accordionItem = document.createElement("div");
                        accordionItem.className = "accordion-item";

                        const headerId = `successNotification${notificationId}`;
                        const accordionId = `collapseSuccess${notificationId}`;

                        accordionItem.innerHTML = `
                            <h2 class="accordion-header" id="${headerId}">
                                <button class="accordion-button text-warning fw-bold collapsed" 
                                        type="button"
                                        data-id="${notificationId}" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#${accordionId}"
                                        aria-expanded="false" 
                                        aria-controls="${accordionId}">
                                    ${notification.title}
                                </button>
                            </h2>
                            <div id="${accordionId}"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="${headerId}" 
                                 data-bs-parent="#notificationsAccordion">
                                <div class="accordion-body">
                                    ${notification.message}
                                </div>
                            </div>
                        `;

                        // Add new notification at the beginning of the accordion
                        notificationsContainer.insertBefore(accordionItem, notificationsContainer.firstChild);

                        // Add listeners to buttons of the new notifications
                        const newButton = accordionItem.querySelector(".accordion-button");
                        addClickListener(newButton);
                    }
                });
            }
        })
        .catch((error) => {
            console.error("Errore durante l'aggiornamento della lista notifiche: ", error);
        });
}

const notificationButtons = document.querySelectorAll(".accordion-button");
notificationButtons.forEach((button) => addClickListener(button));

setInterval(updateNotificationsList, 5000);