function updateStatus(order) {
    const shippingDateElem = order.querySelector(".shipping-date");
    const statusElem = order.querySelector(".status-badge");

    const shippingDate = new Date(shippingDateElem.dataset.date);
    const currentTime = new Date();

    const isShipped = currentTime >= shippingDate;
    const statusText = isShipped ? "Consegnato" : "In elaborazione";
    const statusClass = isShipped ? "bg-success" : "bg-warning";

    statusElem.textContent = statusText;
    statusElem.className = `badge ${statusClass} status-badge`;
}

const orders = document.querySelectorAll(".accordion-item");
orders.forEach((order) => {
    // Update status initially and every second
    updateStatus(order);
    setInterval(updateStatus, 1000, order);
});
