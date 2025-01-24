const url = "check-notifications.php";

function updateNotificationsBadge() {
    const bellIcon = document.querySelector(".bi-bell");
    const badge = bellIcon.parentElement.querySelector(".badge");

    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Errore nel recupero delle notifiche non lette.");
            }
            return response.json();
        })
        .then((unreadNotifications) => {
            if (unreadNotifications > 0) {
                badge.style.display = "inline-block";
            } else {
                badge.style.display = "none";
            }
        })
        .catch((error) => {
            console.error("Errore durante il recupero delle notifiche:", error);
        });
}

setInterval(updateNotificationsBadge, 5000);

