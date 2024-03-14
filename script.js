function addToCart(button) {
    var card = button.parentNode;
    var price = card.querySelector('.item-price').textContent;
    var quantity = card.querySelector('.item-quantity').value;
    var productName = card.querySelector('h4 b').textContent;

    // Create form data to send to cart.php
    var formData = new FormData();
    formData.append('price', price);
    formData.append('quantity', quantity);
    formData.append('productName', productName);

    // Send the data to cart.php using Fetch API
    fetch('cart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        // Handle response data from cart.php
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
// Function to update the price based on the quantity
function updatePrice(quantityInput) {
    // Assuming there's a data attribute 'data-price' that holds the base price of the item
    var basePrice = parseFloat(quantityInput.dataset.price);
    var quantity = parseInt(quantityInput.value);
    var totalPrice = basePrice * quantity;

    // Update the price on the page
    var priceElement = quantityInput.closest('.card').querySelector('.item-price');
    priceElement.textContent = totalPrice.toFixed(2); // Formats the price to 2 decimal places
}

// Add event listeners to all quantity inputs on the page
document.querySelectorAll('.item-quantity').forEach(function(input) {
    input.addEventListener('input', function() {
        updatePrice(this);
    });
});
