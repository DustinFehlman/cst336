<!DOCTYPE html>
<html>

<head>
    <title>Buy A Politician</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url("css/global.css");
        @import url("css/search.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" defer></script>
    <script src="js/global.js" defer></script>
    <script src="js/search.js" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php"><img src="/cst336Final/img/logos/logo.png"></img></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active-nav" href="index.php"><i class="fa fa-home"></i> Home</a>
                <a class="nav-item nav-link custom-nav" href="login.php"><i class="fa fa-sign-in"></i> Log In</a>
                <a class="nav-item nav-link custom-nav" href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <header>
            <h1>Politician Lobbying Platform</h1>
            <h4>Your one stop shop to push your agenda!</h4>
            <hr>
        </header>
        <div class="main-content" id="main-search-div">
        <button class="search-controls" id="product-search-button"><i class="fa fa-search"></i> Search</button>
            <!--will use once backend search is wroking
            <input class="search-controls" placeholder="Politician's Name" type="text" name="product-search" id="name-search"><button class="search-controls" id="product-search-button"><i class="fa fa-search"></i> Search</button>
            <div id="addtional-search-controls">
                <i class="fa fa-caret-right" id="show-more-search"></i><i class="fa fa-caret-down" id="hide-more-search"></i><span id="addtional-search-label"> Addtional Search Filters</span>
                <div id="addtional-search-options">
                        <span>Select by State: </span><select id="state-select" name="state"></select>
                        <br>
                        <span>Politcal Party:</span>
                        <input type="radio" name="party" value="D" class="party-select" id="democrat-option"><label for="democrat-option"> Democrat</label>
                        <input type="radio" name="party" value="R" class="party-select" id="republican-option"><label for="republican-option"> Republican</label> 
                        <input type="radio" name="party" value="I" class="party-select" id="independent-option"><label for="independent-option"> Independent</label> <a class="reset-anchor" id="party-radio-reset">RESET</a>
                </div>
            </div>
            -->
            <div id="products">
                <img class="loading" id="product-loading" src="img/logos/loadingGif.gif"></img>
                <table id="product-table">
                </table>
            </div>
            <h4 id="product-search-error" class="error-font">Error searching for products. Please refresh and try again.</h4>
            <h4 id="product-search-none">No search results.</h4>
        </div>
    </div>
</body>

</html>