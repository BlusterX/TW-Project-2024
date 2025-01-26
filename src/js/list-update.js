function updateProductCard(button, data) {
    const stockElement = button.closest(".card-body").querySelector(".card-text.fw-bolder.stock-count");
    // Update product stock
    stockElement.textContent = `Rimasti: ${data.remainingStock}`;

    // Disable button dynamically if the product is out of stock
    if (data.remainingStock === 0) {
        stockElement.textContent = "Esaurito";
        stockElement.classList.add("text-danger");

        button.textContent = "Non Disponibile";
        button.classList.remove("btn-custom");
        button.classList.add("btn-secondary");
        button.classList.add("disabled");
    }
}

const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
addToCartButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
        // Avoid page refresh
        e.preventDefault();

        const productId = this.getAttribute("data-product-id");
        const url = "api/add-to-cart.php"
        const formData = new FormData();
        formData.append("product_id", productId);
        fetch(url, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    updateProductCard(this, data);
                    console.log(data.message);
                } else {
                    console.error(data.message);
                }
            })
            .catch((error) => {
                console.error("Errore durante l'aggiunta al carrello:", error);
            });
    });
});
