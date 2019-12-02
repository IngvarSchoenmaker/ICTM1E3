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
        } console.log(input.value);
}

function removeCartItem(event){
        var buttonClicked= event.target;
        buttonClicked.parentElement.parentElement.remove();
        updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target;
    input.value = Math.round(input.value);
    if (isNaN(input.value) || input.value <= 0) {
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





// var totaalProduct = document.getElementById("prijs");
// var aantal = document.getElementById("aantal");
// var prijs = document.getElementById("prijs");
// var totaalPrijs = (aantal * prijs);
// totaalProduct.insertAdjacentHTML('beforeend', totaalProduct);
// aantal.addEventListener("change", function(){
//     var ID = document.getElementById("")
// })

// var pageCounter =1;
// var animalContainer = document.getElementById("animal-info")
// var btn = document.getElementById("btn");
// btn.addEventListener("click", function(){
//     var ourRequest = new XMLHttpRequest();
//     ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
//     ourRequest.onload = function(){
//         var ourData = JSON.parse(ourRequest.responseText);
//         renderHTML(ourData);
//     }
//     ourRequest.send();
//     pageCounter ++;
//
// });
//
// function renderHTML(data) {
//     var htmlString = "";
//
//     for (i=0;i<data.length; i++) {
//         htmlString += "<p>" + data[i].name + " is a " + data[i].species + " that likes to eat ";
//
//         for(ii = 0; ii < data[i].foods.likes.length;ii++){
//             if (ii == 0) {
//                 htmlString += data[i].foods.likes[ii];
//             } else {
//                 htmlString += " and " + data[i].foods.likes[ii];
//             }
//
//         }
//
//         htmlString += ' and dislikes ';
//         for(ii = 0; ii < data[i].foods.dislikes.length;ii++){
//             if (ii == 0) {
//                 htmlString += data[i].foods.dislikes[ii];
//             } else {
//                 htmlString += " and " + data[i].foods.dislikes[ii];
//             }
//
//         }
//
//         htmlString += ".</p>"
//     }
//     animalContainer.insertAdjacentHTML('beforeend', htmlString)
// }
