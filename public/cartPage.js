document.addEventListener('DOMContentLoaded', function() {
    var quantitySections = document.querySelectorAll('.quantitySection');

    quantitySections.forEach(function(section) {
        var minusButton = section.querySelector('.minus');
        var plusButton = section.querySelector('.plus');
        var quantityInput = section.querySelector('input[type="text"]');
        var finalQuantity
        var unitPriceElement = section.parentElement.querySelector('.unitpriceSection .foodprice');
        var totalPriceElement = section.parentElement.querySelector('.totalpriceSection .sumtopay');
        var finalPrice = document.querySelector('.totalPrice')
        var finalPriceInput = document.getElementById("price")

        function updateTotalPrice() {
            var quantity = parseInt(quantityInput.value);
            var unitPrice = parseFloat(unitPriceElement.textContent.replace(/[^\d.]/g, ''));
            var totalPrice = quantity * unitPrice;
            totalPriceElement.textContent = 'Rp. ' + totalPrice;
            finalPrice.textContent = 'Rp. ' + totalPrice;
            finalPriceInput.value = totalPrice;
        }

        minusButton.addEventListener('click', function() {
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;

                updateTotalPrice();
            }
        });

        plusButton.addEventListener('click', function() {
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            updateTotalPrice();
        });

        quantityInput.addEventListener('input', updateTotalPrice);

        updateTotalPrice();
    });

});
