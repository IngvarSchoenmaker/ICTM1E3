if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready()
}

    function ready() {
        var removeCartItemButtons = document.getElementsByClassName('btn-danger');
        console.log(removeCartItemButtons);
        for(i=0; i<removeCartItemButtons.length; i++){
            var button = removeCartItemButtons[i];
            button.addEventListener('click', removeCartItem);
        }

        var quantityInputs= document.getElementsByClassName('cart-quantity-input');
        console.log(quantityInputs);
        for (i=0; i < quantityInputs.length; i++){
            var input = quantityInputs[i];
            input.addEventListener('change', quantityChanged)
        }

        var orderButton= document.getElementsByClassName('btn-order');
        orderButton.addEventListener('click',orderCart)
}

function removeCartItem(event){
        var buttonClicked= event.target;
        buttonClicked.parentElement.parentElement.remove();
        updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target;
    input.value = Math.round(input.value);
    if (isNaN(input.value) || input.value <= 0 || input.value >= 100) {
        input.value = 1;
    }
    updateCartTotal()
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemContainer.getElementsByClassName('cart-row');
    var total = 0;
    for(i=0; i< cartRows.length; i++){
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('cart-price')[0];
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
        var price = parseFloat(priceElement.innerText.replace('$', ''));
        var quantity = quantityElement.value;
        var itemTotal = (price * quantity);
        total += (price * quantity);
        itemTotal = Math.round(itemTotal * 100) / 100;
        document.getElementsByClassName('item-total')[i].innerText = '$' + itemTotal;
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total;
}

function orderCart() {

}