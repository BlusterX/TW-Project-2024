document.addEventListener('DOMContentLoaded', () => {
    // Seleziona gli input dei campi
    const priceInput = document.getElementById('price');
    const discountInput = document.getElementById('discount');
    const finalPriceInput = document.getElementById('final_price');

    // Funzione per calcolare e aggiornare il prezzo finale
    function updateFinalPrice() {
        // Ottieni i valori degli input
        const price = parseFloat(priceInput.value.replace(',', '.')) || 0; // Converti in numero, default 0
        const discount = parseInt(discountInput.value) || 0; // Converti in numero intero, default 0

        // Calcola il prezzo finale
        const finalPrice = price - (price * discount / 100);

        // Aggiorna il valore dell'input "Prezzo finale"
        finalPriceInput.value = finalPrice.toLocaleString('it-IT', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' €';
    }

    // Aggiungi gli event listener agli input
    priceInput.addEventListener('input', updateFinalPrice);
    discountInput.addEventListener('input', updateFinalPrice);

    // Calcolo iniziale quando la pagina viene caricata
    updateFinalPrice();
});
