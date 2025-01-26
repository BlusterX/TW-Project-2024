const accordionItems = document.querySelectorAll(".accordion-item");

function initializeAccordions() {
    accordionItems.forEach((item) => {
        const collapseElem = item.querySelector(".accordion-collapse");
        const isExpanded = collapseElem.classList.contains("show");
        collapseElem.style.maxHeight = isExpanded ? collapseElem.scrollHeight + "px" : "0";
    });
}

function showOrderDetails(button, collapseElement) {
    button.classList.remove("collapsed");
    button.setAttribute("aria-expanded", "true");
    collapseElement.classList.add("show");

    // Calculate the height of the element for the animation
    collapseElement.style.maxHeight = collapseElement.scrollHeight + "px";
}

function hideOrderDetails(button, collapseElement) {
    button.classList.add("collapsed");
    button.setAttribute("aria-expanded", "false");
    collapseElement.style.maxHeight = collapseElement.scrollHeight + "px";
    collapseElement.offsetHeight;
    collapseElement.classList.remove("show");
    collapseElement.style.maxHeight = "0";
}

// Show details of the pending orders, or the last order if all orders are delivered
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

accordionItems.forEach((item) => {
    const collapseElem = item.querySelector(".accordion-collapse");
    const button = item.querySelector(".accordion-button");

    // Add toggle functionality to each order
    button.addEventListener("click", () => {
        const isOpen = button.getAttribute("aria-expanded") === "true";
        isOpen ? hideOrderDetails(button, collapseElem) : showOrderDetails(button, collapseElem);
    });
});
