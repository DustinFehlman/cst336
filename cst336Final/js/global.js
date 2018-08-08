class Product {
    constructor() {
        this.firstName = null;
        this.lastName = null;
        this.state = null;
        this.party = null;
        this.price = null;
        this.img = null;
        this.id = null;
    }
}

function ajaxCall(type, url, payload, successCallback, errorCallback){
     $.ajax({
      url: url,
      type: type,
      data: payload,
      success: successCallback,
      error: errorCallback
    });
}

function updateCart(cartArr){
    localStorage.removeItem("cart");
    localStorage.setItem("cart", JSON.stringify(cartArr));
}

function handleGetProductsResponse(data, status){
  if(status === "success"){
      var parsedData = JSON.parse(data);
      parseProductResponse(parsedData, loadProductTable);
      
  }

}

