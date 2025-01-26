function updateBadge(badge, count) {
    if (count > 0) {
        badge.textContent = count <= 9 ? count : "9+";
        badge.style.display = "inline-block"; // Show the circle
    } else {
        badge.style.display = "none"; // Hide the circle
    }
}

function updateNotificationsBadge() {
    const badge = document.getElementById("notificationBadge");
    const url = "api/check-notifications.php";
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Errore nel recupero delle notifiche non lette.");
            }
            return response.json();
        })
        .then((data) => {
            updateBadge(badge, data.unreadNotifications.length);
        })
        .catch((error) => {
            console.error("Errore durante il recupero delle notifiche:", error);
        });
}

function updateCartBadge() {
    const badge = document.getElementById("cartBadge");
    const url = "api/cart-count.php";
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Errore nel recupero del numero di prodotti nel carrello.");
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                updateBadge(badge, data.cartCount);
            } else {
                console.error(data.message);
            }
        })
        .catch((error) => {
            console.error("Errore durante il recupero del numero di prodotti nel carrello:", error);
        });
}

function updateToolbar() {
    updateNotificationsBadge();
    updateCartBadge();
}

// Update the badges as soon as the page is loaded, then every second
updateToolbar();
setInterval(updateToolbar, 1000);
