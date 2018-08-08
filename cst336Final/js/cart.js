//TEST stuff
var cart = JSON.parse(localStorage.getItem("cart"));
loadCartTable();

function loadCartTable() {
    if (cart.length == 0) {
        $("#empty-cart-warning").show();
    }
    else {
        var rowCounter = 0;
        for (var x = 0; x < cart.length; x++) {
            $("#cart-table").append("<tr class='cart-table-row' id='cart-row-" + rowCounter + "'>");
            var imgString = "<img src='" + cart[x].img + "' alt='" + cart[x].lastName + "'>";
            $("#cart-row-" + rowCounter).append("<td class='cart-td'>" + imgString + "</td>");
            var nameString = cart[x].firstName + " " + cart[x].lastName;
            var infoString = cart[x].state + ", " + cart[x].party;
            $("#cart-row-" + rowCounter).append("<td class='cart-td cart-top-align'>" + nameString + "<br>" +
                infoString);
            var priceString = "$" + cart[x].price;
            $("#cart-row-" + rowCounter).append("<td class='cart-td cart-top-align'>" + priceString + "</td>");
            var buttonString = "<button class='remove-from-cart-button' id='"+cart[x].id+"'>Remove</button>";
            $("#cart-row-" + rowCounter).append("<td class='cart-td cart-top-align'>" + buttonString + "</td>");
            rowCounter++;
            $("#" + cart[x].id).click(function(){
                removeFromCart(this.id);
            });
        }
        var cartTotal = sumCartPrice();
         $("#cart-table").append("<tr class='cart-table-row' id='cart-totals-row'>");
         var checkoutButtonString = "<button class='purchase-button'>Purchase</button>";
         var totalPriceString = "<span>Total: $" + cartTotal + "</span>";
         $("#cart-totals-row").append("<td colspan='4' class='cart-td'>" + totalPriceString + "<br>" +
                                checkoutButtonString + "</td>");
    }

}

function sumCartPrice() {
    var cartTotalMap = cart.map(function(item) {
        return item.price;
    });
    return cartTotalMap.reduce(function(total, num) {
        return (parseFloat(total) + parseFloat(num)).toFixed(2);
    });
}

function clearCartTable(){
    $("#cart-table").empty();
}
function removeFromCart(itemID){
   for(var x = 0; x < cart.length; x++){
        if(cart[x].id == itemID){
            cart.splice(cart.indexOf(cart[x]), 1);
        }
    }
    updateCart(cart);
    clearCartTable();
    loadCartTable();
}


