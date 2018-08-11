var movies = [];
var valueOfSearchInput;
$("#product-search-button").prop("disabled",true);

class Movie {
    constructor() {
        this.title = null;
        this.imgURL = null;
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

function handleSearchMoviesResponse(data, status){
  if(status === "success"){
      var parsedData = JSON.parse(data);
      parseSearchMovieResponse(parsedData, loadMovieTable);
  }
}

function handleSearchTermResponse(data, status){
  if(status === "success"){
        var parsedData = JSON.parse(data);
        if(parsedData.status === "success"){
            $("#search-value").append(valueOfSearchInput);
            $("#search-count").append(parsedData.count);
            $("#search-count-container").removeClass("noDisplay");
        }
  }
}

function parseSearchMovieResponse(response, callback) {
    if (response) {
        for (var x in response.results) {
            var tempObj = new Movie();
            tempObj.title = response.results[x].title;
            if(response.results[x].poster_path){
                tempObj.imgURL = "https://image.tmdb.org/t/p/w154"+ response.results[x].poster_path;
            }
            else{
                tempObj.imgURL = "/cst336/extraCredit/img/unavailable-200x145.png";
            }
            tempObj.overview = response.results[x].overview;
            movies.push(tempObj);
        }
        movies.sort(function(a,b) {return (a.title > b.title) ? 1 : ((b.title > a.title) ? -1 : 0);} );
        callback();
    }
    else{
        showNoSearchResults();
    }
}

function clearMovieTable(){
     $("#product-table").empty();
     movies = [];
     $("#product-search-error").hide();
     $("#product-search-none").hide();
}

function loadMovieTable() {
    var rowCounter = 0;
    $("#product-table").append("<tr class='product-table-row' id='product-row-0'></tr>");
    for (var x = 0; x < movies.length; x++) {
        if (x % 5 == 0 && x >= 5) {
            rowCounter++;
            $("#product-table").append("<tr class='product-table-row' id='product-row-" + rowCounter + "'>");
        }
        var imgString = "<img src='" + movies[x].imgURL + "' alt='" + movies[x].title + "'>";
        var titleString = movies[x].title;
        $("#product-row-" + rowCounter).append("<td class='product-td'>" + imgString + "<br>" +
            titleString + "</td>");
    }
    responseLoaded();
}

function getMovieSearch(){
    var searchText;
    searchText = $("#name-search").val();
    valueOfSearchInput = $("#name-search").val();
    var payload = {
        searchText: searchText
    }
    ajaxCall('post', 'inc/searchMovieNameApi.php', payload, handleSearchMoviesResponse, showGetMoviesResponseError);
}

function getSearchInfo(){
    var searchText;
    searchText = $("#name-search").val();
    var payload = {
        searchText: searchText
    }
    ajaxCall('post', 'inc/checkSearchQuery.php', payload, handleSearchTermResponse, showGetMoviesResponseError);
}

function showGetMoviesResponseError(){
    $("#product-search-error").show();
    responseLoaded();
}

function showNoSearchResults(){
    $("#product-search-none").show();
    responseLoaded();
}

function responseLoading(){
    $("#product-loading").show();
    $("#product-search-button").addClass("disabled");
}

function responseLoaded(){
    $("#product-search-button").prop("disabled",false);
    $("#product-loading").hide();
    $("#product-search-button").removeClass("disabled");
}

function reset(){
    $("#product-search-error").hide();
    $("#product-search-none").hide();
    $("#search-count-container").addClass("noDisplay");
    $("#search-value").html("");
    $("#search-count").html("");
}

$("#product-search-button").click(function(){
     $("#product-search-button").prop("disabled",true);
     responseLoading();
     clearMovieTable();
     getMovieSearch();
     getSearchInfo();
     reset();
});

$("#name-search").keyup(function(){
    if(this.value){
        $("#product-search-button").removeClass("disabled");
        $("#product-search-button").prop("disabled",false);
    }
    else{
        $("#product-search-button").addClass("disabled");
        $("#product-search-button").prop("disabled",true);
    }
});




 
 







