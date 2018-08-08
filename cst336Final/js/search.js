var products = [];
var cart = JSON.parse(localStorage.getItem("cart"));
var states = [
    "AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",
    "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA",
    "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE",
    "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC",
    "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY"
];

if(!cart){
    cart = [];
}

loadStateDropdown();

function loadStateDropdown() {
     $('<option/>').val("").html("").appendTo('#state-select');
    for (var i = 0; i < states.length; i++) {
        $('<option/>').val(states[i]).html(states[i]).appendTo('#state-select');
    }
}

function inCartCheck(elemID){
    for(var x = 0; x < cart.length; x++){
        if(cart[x].id == elemID){
           $("#" + elemID).html("In Cart");
           $("#" + elemID).addClass("disabled");
           return;
        }
    }
    $("#" + elemID).html("Add To Cart");
    return;
}

function parseProductResponse(response, callback) {
    if (response) {
        for (var x in response) {
            var tempProduct = new Product();
            tempProduct.firstName = response[x].sen_firstName;
            tempProduct.lastName = response[x].sen_lastName;
            tempProduct.state = response[x].state;
            tempProduct.party = response[x].party;
            tempProduct.id = response[x].senId;
            tempProduct.price = response[x].price;
            tempProduct.img = "/cst336Final/img/" + response[x].imgURL + ".jpg";
            products.push(tempProduct);
        }
        products.sort(function(a,b) {return (a.lastName > b.lastName) ? 1 : ((b.lastName > a.lastName) ? -1 : 0);} );
        callback();
    }
    else{
        showNoSearchResults();
    }
}
function clearProductTable(){
     $("#product-table").empty();
     products = [];
     $("#product-search-error").hide;
     $("#product-search-none").hide;
     
}

function loadProductTable() {
    var rowCounter = 0;
    $("#product-table").append("<tr class='product-table-row' id='product-row-0'></tr>");
    for (var x = 0; x < products.length; x++) {
        if (x % 5 == 0 && x >= 5) {
            rowCounter++;
            $("#product-table").append("<tr class='product-table-row' id='product-row-" + rowCounter + "'>");
        }
        var imgString = "<img src='" + products[x].img + "' alt='" + products[x].lastName + "'>";
        var nameString = products[x].firstName + " " + products[x].lastName;
        var infoString = products[x].state + ", " + products[x].party;
        var priceString = "$" + products[x].price;
        var buttonString = "<button id='" + products[x].id + "' class='add-to-cart-button'></button>";
        $("#product-row-" + rowCounter).append("<td class='product-td' id='product-td-" + products[x].id + "'>" + imgString + "<br>" +
            nameString + "<br>" + infoString + "<br>" + priceString + "<br>" + buttonString + "</td>");
        inCartCheck(products[x].id);    
        $("#" + products[x].id).click(function(){
            addItemToCart($(this).attr('id'));
        });
    }
    productLoaded();
}

function getProducts(){
    var searchText;
    var nameValue;
    var stateValue;
    var partyValue;
    
    searchText = $("#name-search").val();
    stateValue = $('#state-select option:selected').text();
    partyValue = $('input[party]:checked').val();
        //samepleajax : ajaxCall('post', "inc/adminReports.php", {function: "mostExp"}, showMostExpensive, showReportError)

    if(!searchText, !stateValue, !partyValue){
        ajaxCall('get', 'inc/showAllProducts.php', null, handleGetProductsResponse, showGetProductsResponseError);
    }
    
    //loadProductTable();
}

function handleGetProductsResponse(data, status){
  if(status === "success"){
      var parsedData = JSON.parse(data);
      parseProductResponse(parsedData, loadProductTable);
      
  }
  
}

function showGetProductsResponseError(){
    $("#product-search-error").show;
    productLoaded();
    
}

function showNoSearchResults(){
    $("#product-search-none").show;
    productLoaded();
}


function addItemToCart(itemId){
    for(var x = 0; x < products.length; x++){
        if(itemId == products[x].id){
            console.log(products[x]);
            cart.push(products[x]);
        }
    }
    updateCart(cart);
    inCartCheck(itemId);
}

function productLoading(){
    $("#product-loading").show();
    $("#product-search-button").addClass("disabled");
}

function productLoaded(){
    $("#product-loading").hide();
    $("#product-search-button").removeClass("disabled");
}

$("#hide-more-search").click(function(){
     $(this).hide();
     $("#show-more-search").show();
     $("#addtional-search-options").hide();
});

$("#show-more-search").click(function(){
     $(this).hide();
     $("#hide-more-search").show();
     $("#addtional-search-options").show();
});

$("#show-more-search").click(function(){
     $(this).hide();
     $("#hide-more-search").show();
     $("#addtional-search-options").show();
});

$("#product-search-button").click(function(){
     productLoading();
     clearProductTable();
     getProducts();
});

$("#party-radio-reset").click(function(){
    $( ".party-select" ).prop( "checked", false );
});



 
 





