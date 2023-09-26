    // Get references to the quantity input field and the price element
    const quantityInput = document.getElementById('quantityInput');
    const priceElement = document.querySelector('.input-group-text');

    // Initial price value
    const initialPrice = parseFloat(priceElement.textContent);

    // Add an event listener to the quantity input field
    quantityInput.addEventListener('input', function() {
        // Get the current quantity value
        const quantity = parseInt(this.value);

        // Calculate the total price
        const totalPrice = initialPrice * quantity;

        // Update the displayed price
        priceElement.textContent = totalPrice.toFixed(2) + " JOD"; // Assuming 2 decimal places
        // Update the hidden price input field
        hiddenPrice.value = totalPrice.toFixed(2); // Update the hidden input field
    });
