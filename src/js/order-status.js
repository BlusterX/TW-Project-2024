function checkOrders() {
    const url = "update-orders.php";

    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Errore nel controllo dello stato degli ordini.");
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                // TODO: controllo array vuoto?
                // TODO: controllo se mi trovo in pagina ordini
                const orders = document.querySelectorAll(".accordion-item");
                orders.forEach((order) => {
                    const statusElem = order.querySelector(".status-badge");
                    // Convert dataset orderId string into int for the comparison
                    const orderId = parseInt(order.dataset.orderId, 10);
                    const updatedOrders = data.updatedOrders;
                    // Update status of shipped orders
                    if (updatedOrders.includes(orderId)) {
                        statusElem.textContent = "Consegnato";
                        statusElem.classList = "badge bg-success status-badge";
                    }
                });
            } else {
                console.error("Errore nella risposta:", data.message);
            }
        })
        .catch((error) => {
            console.error("Errore durante il controllo degli ordini:", error);
        });
}

setInterval(checkOrders, 1000);