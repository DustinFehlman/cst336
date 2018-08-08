<?php
    session_start();
    if(!isset($_SESSION['username']) && $_SESSION['valid'] != "true" ){
        header('Location: /cst336Final/login.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url("css/global.css");
        @import url("css/admin.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" defer></script>
    <script src="js/global.js" defer></script>
    <script src="js/adminPanel.js" defer></script>
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
            <h1></span>Admin Panel</h1>
            <hr>
        </header>
        <div class="main-content" id="admin-panel">
            <h4>Edit Products:</h4>
                <table id="product-admin-table">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>State</th>
                        <th>Party</th>
                        <th>Img URL</th>
                        <th>Price</th>
                    </tr>
                </table>
            <br>
            <br>
             <h4>Add Product:</h4>
             <table id="add-product-table">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>State</th>
                        <th>Party</th>
                        <th>Img URL</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td><input type='text' id='new-first' class='first-edit new-field'></input></td>
                        <td><input type='text' id='new-last' class='last-edit new-field'></input></td>
                        <td><input type='text' id='new-state' class='state-edit new-field'></input></td>
                        <td><input type='text' id='new-party' class='party-edit new-field'></input></td>
                        <td><input type='text' id='new-img' class='img-edit new-field'></input></td>
                        <td><input type='text' id='new-price' class='price-edit new-field'></input></td>
                        <td class="row-edit-controls"><button id='submit-new' class='edit-submit'>Submit</button></td>
                    </tr>
                </table>
            <br>
            <br>
            <h4>Reporting:</h4>
            <button class="admin-report-button" id="avg-product-price">Get Average Product Price</button>
            <button class="admin-report-button" id="total-party-count">Get Party Affiliation Count</button>
            <button class="admin-report-button" id="most-expensive-product">Get Most Expensive Product</button>
            <div id="report-results">
                <p id="avg-price" class="reports">The average price of all the senetors is <span id="avg-product-price-total"></span></p>
                <p id="party-count" class="reports">The totals for each politcal party: <span id="party-total"></span></p>
                <p id="most-expensive-label" class="reports">The the most expensive senetor is <span id="most-expensive"></span></p>
                <p id="report-error" class="error-font">Sorry. That report had an issue. Please try again.</p>
            </div>
        </div>
    </div>
</body>
</html>