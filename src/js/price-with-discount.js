const priceInput = document.getElementById("price");
const discountInput = document.getElementById("discount");
const finalPriceInput = document.getElementById("final_price");

function updateFinalPrice() {
    const price = parseFloat(priceInput.value.replace(",", ".")) || 0;
    const discount = parseInt(discountInput.value) || 0;

    const finalPrice = price - (price * discount) / 100;
    finalPriceInput.value =
        finalPrice.toLocaleString("it-IT", { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " €";
}

priceInput.addEventListener("input", updateFinalPrice);
discountInput.addEventListener("input", updateFinalPrice);
updateFinalPrice();
