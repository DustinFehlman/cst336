var products = [];

getAllProducts();

function parseProductResponse(response, callback) {
    console.log(response);
    if (response) {
        for (var x in response) {
            var tempProduct = new Product();
            tempProduct.firstName = response[x].sen_firstName;
            tempProduct.lastName = response[x].sen_lastName;
            tempProduct.state = response[x].state;
            tempProduct.party = response[x].party;
            tempProduct.id = response[x].senId;
            tempProduct.price = response[x].price;
            tempProduct.img = response[x].imgURL;
            products.push(tempProduct);
        }
        products.sort(function(a, b) { return (parseInt(a.id) > parseInt(b.id)) ? 1 : ((parseInt(b.id) > parseInt(a.id)) ? -1 : 0); });
        console.log(products);
        callback();
    }
}

function getAllProducts() {
    ajaxCall('get', 'inc/showAllProducts.php', null, handleGetProductsResponse, null);
}

function loadProductTable() {
    for (var x = 0; x < products.length; x++) {
        $("#product-admin-table").append("<tr class='product-table-row' id='product-row-" + x + "'>");
        $("#product-row-" + x).append("<td class='product-td product-td-s' id='id" + products[x].id + "'><span id='id-value-" + products[x].id + "'>" + products[x].id + "</span><input id='id-edit-" + products[x].id + "' type='text' class='id-edit edit-field' value='" + products[x].id + "'></input></td>");
        $("#product-row-" + x).append("<td class='product-td' id='" + products[x].firstName + "'><span id='first-value-" + products[x].id + "'>" + products[x].firstName + "</span><input id='first-edit-" + products[x].id + "' type='text' class='first-edit edit-field' value='" + products[x].firstName + "'></input></td>");
        $("#product-row-" + x).append("<td class='product-td' id='" + products[x].lastname + "'><span id='last-value-" + products[x].id + "'>" + products[x].lastName + "</span><input id='last-edit-" + products[x].id + "' type='text'class='last-edit edit-field' value='" + products[x].lastName + "'></input></td>");
        $("#product-row-" + x).append("<td class='product-td product-td-s' id='" + products[x].state + "'><span id='state-value-" + products[x].id + "'>" + products[x].state + "</span><input id='state-edit-" + products[x].id + "' type='text' class='state-edit edit-field' value='" + products[x].state + "'></input></td>");
        $("#product-row-" + x).append("<td class='product-td product-td-s' id='" + products[x].party + "'><span id='party-value-" + products[x].id + "'>" + products[x].party + "</span><input id='party-edit-" + products[x].id + "' type='text' class='party-edit edit-field' value='" + products[x].party + "'></input></td>");
        $("#product-row-" + x).append("<td class='product-td' id='" + products[x].img + "'><span id='img-value-" + products[x].id + "'>" + products[x].img + "</span><input id='img-edit-" + products[x].id + "' type='text' class='img-edit edit-field' value='" + products[x].img + "'></input></td>");
        $("#product-row-" + x).append("<td class='product-td' id='" + products[x].price + "'><span id='price-value-" + products[x].id + "'>" + products[x].price + "</span><input id='price-edit-" + products[x].id + "' type='text' class='price-edit edit-field' value='" + products[x].price + "'></input></td>");
        $("#product-row-" + x).append("<td class='row-edit-controls' id='edit-" + products[x].id + "'>Edit</td>");
        $("#product-row-" + x).append("<td class='row-edit-controls no-display' id='cancel-" + products[x].id + "'>Cancel</td>");
        $("#product-row-" + x).append("<td class='row-edit-controls' id='submit-" + products[x].id + "'><button id='submit-edit-" + products[x].id + "' class='edit-submit no-display'>Submit</button></td>");
        $("#product-row-" + x).append("<td class='row-edit-controls' id='delete-" + products[x].id + "'><button id='delete-edit-" + products[x].id + "' class='edit-delete no-display'>Delete</button></td>");
        
        $("#edit-" + products[x].id).click(function() {
            var elemID = $(this).attr('id');
            var stringTrim = "edit-";
            var productID = elemID.substring(stringTrim.length, elemID.length);
            console.log(productID);
            showEditFields(productID);
            $("#cancel-" + productID).removeClass("no-display");
            $(this).hide();
        });
        
        $("#submit-edit-" + products[x].id).click(function() {
            var elemID = $(this).attr('id');
            var stringTrim = "sumbit-edit-";
            var productID = elemID.substring(stringTrim.length, elemID.length);
            submitProductEdits(productID);
        });
        
         $("#delete-edit-" + products[x].id).click(function() {
            var elemID = $(this).attr('id');
            var stringTrim = "delete-edit-";
            var productID = elemID.substring(stringTrim.length, elemID.length);
            deleteProduct(productID);
        });
        
        $("#cancel-" + products[x].id).click(function() {
            var elemID = $(this).attr('id');
            var stringTrim = "cancel-";
            var productID = elemID.substring(stringTrim.length, elemID.length);
            hideEditFields(productID);
            $("#edit-" + productID).show();
            $(this).addClass("no-display");
        });
    }
}

function showEditFields(buttonID) {
    $("#id-edit-" + buttonID).show();
    $("#first-edit-" + buttonID).show();
    $("#last-edit-" + buttonID).show();
    $("#state-edit-" + buttonID).show();
    $("#party-edit-" + buttonID).show();
    $("#img-edit-" + buttonID).show();
    $("#price-edit-" + buttonID).show();
    $("#submit-edit-" + buttonID).show();
    $("#delete-edit-" + buttonID).show();

    $("#id-value-" + buttonID).hide();
    $("#first-value-" + buttonID).hide();
    $("#last-value-" + buttonID).hide();
    $("#state-value-" + buttonID).hide();
    $("#party-value-" + buttonID).hide();
    $("#img-value-" + buttonID).hide();
    $("#price-value-" + buttonID).hide();

}

function hideEditFields(buttonID) {
    $("#id-edit-" + buttonID).hide();
    $("#first-edit-" + buttonID).hide();
    $("#last-edit-" + buttonID).hide();
    $("#state-edit-" + buttonID).hide();
    $("#party-edit-" + buttonID).hide();
    $("#img-edit-" + buttonID).hide();
    $("#price-edit-" + buttonID).hide();
    $("#submit-edit-" + buttonID).hide();
    $("#delete-edit-" + buttonID).hide();

    $("#id-value-" + buttonID).show();
    $("#first-value-" + buttonID).show();
    $("#last-value-" + buttonID).show();
    $("#state-value-" + buttonID).show();
    $("#party-value-" + buttonID).show();
    $("#img-value-" + buttonID).show();
    $("#price-value-" + buttonID).show();
}

function submitProductEdits(itemID){
    var payload = {
        firstName:  $("#first-edit-" + itemID).val(),
        lastName:  $("#last-edit-" + itemID).val(),
        state:  $("#first-edit-" + itemID).val(),
        partyId:  1,
        price: $("#price-edit-" + itemID).val(),
        id: $("#id-edit-" + itemID).val(),
        imgURL: $("#img-edit-" + itemID).val()
    }
    ajaxCall('post', 'inc/updateProduct.php', payload, refreshPage, null);
}

function deleteProduct(itemID){
    var payload = {
        id: $("#id-edit-" + itemID).val()
    }
    ajaxCall('post', 'inc/deleteProduct.php', payload, refreshPage, null);
}

function submitNewProduct(){
    var payload = {
        firstName:  $("#new-first").val(),
        lastName:  $("#new-last").val(),
        state:  $("#new-state").val(),
        partyId:  1,
        price: $("#new-price").val(),
        imgURL: $("#new-img").val()
    }
    ajaxCall('post', 'inc/addProduct.php', payload, refreshPage, null);
}

function refreshPage(){
    location.reload();
}

function showAvgPrice(data, status) {
    if (status === "success") {
        $("#avg-product-price-total").html("");
        var parsedData = JSON.parse(data)
        $("#avg-product-price-total").append(cleanMoney(parsedData.avgPrice));
        $("#avg-price").show();
    }
}

//Still needs work
function showPartyCount(data, status) {
    if (status === "success") {
        var parsedData = JSON.parse(data);
        for(var x = 0; x < parsedData.length; x++){
            $("#party-count").append("<br>"+ parsedData[x].party + ": " + parsedData[x].count);
        }
       
        $("#party-count").show();
    }
}

function showMostExpensive(data, status) {
    if (status === "success") {
        $("#most-expensive").html("");
        var parsedData = JSON.parse(data);
        var string = parsedData.sen_firstName + " " + parsedData.sen_lastName + " at an amount of " + cleanMoney(parsedData.max) + ".";
        $("#most-expensive").append(string);
        $("#most-expensive-label").show();
    }
}

function showReportError() {
    $("#report-error").show();
}

function cleanMoney(money) {
    return "$" + parseFloat(money).toFixed(2);
}

$("#avg-product-price").click(function() {
    $("#report-error").hide();
    ajaxCall('post', "inc/adminReports.php", { function: "avgProduct" }, showAvgPrice, showReportError)
});

$("#total-party-count").click(function() {
    $("#report-error").hide();
    ajaxCall('post', "inc/adminReports.php", { function: "partyCount" }, showPartyCount, showReportError)
});

$("#most-expensive-product").click(function() {
    $("#report-error").hide();
    ajaxCall('post', "inc/adminReports.php", { function: "mostExp" }, showMostExpensive, showReportError)
});

$("#submit-new").click(function() {
   submitNewProduct();
});

