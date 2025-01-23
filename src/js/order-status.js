
function updateStatus(order) {
    const shippingDateElem = order.querySelector(".shipping-date");
    const statusElem = order.querySelector(".status-badge");

    const shippingDate = new Date(shippingDateElem.dataset.date);
    const currentTime = new Date();

    if (currentTime < shippingDate) {
        statusElem.textContent = "In elaborazione";
        statusElem.classList = "badge bg-warning status-badge";
        if (shippingDate - currentTime < 1000) {
            sendNotificationRequest(order.dataset.orderId);
        }
    } else {
        statusElem.textContent = "Consegnato";
        statusElem.classList = "badge bg-success status-badge";
        return true;
    }
    return false;
}

function sendNotificationRequest(orderId) {
    const url = "shipping-notification.php";
    const formData = new FormData();
    formData.append("order_id", orderId);
    fetch(url, {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data.success ? "Notifica creata: " + data.message : "Errore notifica: " + data.message);
        })
        .catch((error) => {
            console.error("Errore durante la notifica:", error);
        });
}

const orders = document.querySelectorAll(".accordion-item");
    orders.forEach((order) => {
        const statusElem = order.querySelector(".status-badge");
        if (statusElem.classList.contains("bg-success")) {
            // Initial update
            updateStatus(order);
            const intervalId = setInterval(() => {
                // Orders already updated to "success" are removed from the interval
                if (updateStatus(order)) {
                    clearInterval(intervalId);
                }
            }, 1000);
        }
    });