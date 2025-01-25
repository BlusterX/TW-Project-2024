const accordionItems = document.querySelectorAll(".accordion-item");

function showOrderDetails(button, collapseElement) {
    button.classList.remove("collapsed");
    button.setAttribute("aria-expanded", "true");
    collapseElement.style.display = "block";
}

function hideOrderDetails(button, collapseElement) {
    button.classList.add("collapsed");
    button.setAttribute("aria-expanded", "false");
    collapseElement.style.display = "none";
}

// Show details of the pending orders, or the last order if all orders are delivered
function showLastOrders() {
    let ordersToShow = [];
    let lastOrder = null;
    let maxOrderId = 0;

    accordionItems.forEach((item) => {
        const orderId = parseInt(item.dataset.orderId);
        const isDelivered = item.querySelector(".status-badge").classList.contains("bg-success");

        // Keep track of the last order
        if (orderId > maxOrderId) {
            maxOrderId = orderId;
            lastOrder = item;
        }

        if (!isDelivered) {
            ordersToShow.push(item);
        }
    });

    // If all orders are delivered, show the last order
    if (ordersToShow.length === 0) {
        ordersToShow.push(lastOrder);
    }

    ordersToShow.forEach((order) => {
        const collapseElem = order.querySelector(".accordion-collapse");
        const buttonElement = order.querySelector(".accordion-button");
        showOrderDetails(buttonElement, collapseElem);
    });
}

accordionItems.forEach((item) => {
    const collapseElem = item.querySelector(".accordion-collapse");
    const button = item.querySelector(".accordion-button");

    // Add toggle functionality to each order
    button.addEventListener("click", () => {
        const isOpen = button.getAttribute("aria-expanded") === "true";
        isOpen ? hideOrderDetails(button, collapseElem) : showOrderDetails(button, collapseElem);
    });
});
showLastOrders();
