const accordionItems = document.querySelectorAll(".accordion-item");

function initializeAccordions() {
    accordionItems.forEach((item) => {
        const collapseElem = item.querySelector(".accordion-collapse");
        const isExpanded = collapseElem.classList.contains("show");

        // Imposta il valore iniziale di max-height
        collapseElem.style.maxHeight = isExpanded ? collapseElem.scrollHeight + "px" : "0";
    });
}

function showOrderDetails(button, collapseElement) {
    button.classList.remove("collapsed");
    button.setAttribute("aria-expanded", "true");
    collapseElement.classList.add("show");

    // Calcola l'altezza del contenuto e impostala per l'animazione
    collapseElement.style.maxHeight = collapseElement.scrollHeight + "px";
}

function hideOrderDetails(button, collapseElement) {
    button.classList.add("collapsed");
    button.setAttribute("aria-expanded", "false");
    collapseElement.style.maxHeight = collapseElement.scrollHeight + "px";
    collapseElement.offsetHeight;
    collapseElement.classList.remove("show");

    // Imposta l'altezza a 0 per il collasso
    collapseElement.style.maxHeight = "0";
}

// Mostra gli ordini non consegnati o l'ultimo ordine
function showLastOrders() {
    let ordersToShow = [];
    let lastOrder = null;
    let maxOrderId = 0;

    accordionItems.forEach((item) => {
        const orderId = parseInt(item.dataset.orderId);
        const isDelivered = item.querySelector(".status-badge").classList.contains("bg-success");

        if (orderId > maxOrderId) {
            maxOrderId = orderId;
            lastOrder = item;
        }

        if (!isDelivered) {
            ordersToShow.push(item);
        }
    });

    if (ordersToShow.length === 0 && lastOrder) {
        ordersToShow.push(lastOrder);
    }

    ordersToShow.forEach((order) => {
        const collapseElem = order.querySelector(".accordion-collapse");
        const buttonElement = order.querySelector(".accordion-button");

        showOrderDetails(buttonElement, collapseElem);
    });
}

initializeAccordions();
showLastOrders();

// Aggiungi la funzionalità di toggle
accordionItems.forEach((item) => {
    const collapseElem = item.querySelector(".accordion-collapse");
    const button = item.querySelector(".accordion-button");

    // Aggiungi il listener per l'apertura e chiusura
    button.addEventListener("click", () => {
        const isOpen = button.getAttribute("aria-expanded") === "true";
        isOpen ? hideOrderDetails(button, collapseElem) : showOrderDetails(button, collapseElem);
    });
});
