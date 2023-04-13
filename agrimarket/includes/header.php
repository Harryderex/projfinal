<?php
include("./includes/function.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMarket | Fresh food, Online Access</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="style.css">


    <!-- CSS PLUGINS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome.css">
    <link rel="stylesheet" href="assets/plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />

    <!-- SCRIPT PLUGINS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/cart.js"></script>
    <script src="assets/plugins/jquery.min.js"></script>
    <script src="assets/plugins/fontawesome.js"></script>
    <script src="assets/plugins/owl.carousel.min.js"></script>
    
</head>
<body>

    <div class="topbar">

        <div class="actions">

            <?php
                getUsername();
            ?>
            
        </div>

    </div>

    <div class="navbar flex row-between">
        
        <div class="navlinks">
            <a href="index.php" class="logo">
                <img src="favicon.png" alt="logo" class="logo-img">
                <span class="logo-text">AgriMarket</span>
            </a>

            <a href="index.php" class="navlink ">home</a>
            <a href="market.php" class="navlink active">Explore our marketplace</a>
            <a href="seller.php" class="navlink">Meet our sellers</a>
        </div>

        <div class="nav-actions">

            <form action="searchresult.php" method="post" class="searchbar">
                <input type="search" name="searchvalue" id="searchvalue" placeholder="Type in what you need">
                <button type="submit" name="search" id="search"><i class="fas fa-search"></i></button>
            </form>

            <a href="cart.php" class="nav-cart cart-counter" id="cart-info">
            <div class="icon"><i class="fas fa-shopping-cart"></i>		
                    <?php 
                    if(isset($_SESSION["product"])){
                        echo count($_SESSION["product"]); 
                    } else {
                        echo 0; 
                    }
                    ?>
                </span>
            </div>
                <span class="cart-item" id="cart-container">cart</span>
            </a>

        </div>

    </div>

    