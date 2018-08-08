<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url("css/global.css");
        @import url("css/cart.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" defer></script>
    <script src="js/global.js" defer></script>
    <script src="js/cart.js" defer></script>
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
            <h1><span class="fa fa-shopping-cart large-cart"></span> Shopping Cart</h1>
            <hr>
        </header>
        <div class="main-content">
            <div id="empty-cart-warning">
                <h3 class="error-font">Your cart is currently empty.</h2>
            </div>
            <table id="cart-table"></table>
        </div>
    </div>
</body>

</html>