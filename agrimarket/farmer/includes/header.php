<?php
include("./includes/function.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMarket | Fresh food, Online Access</title>
    <link rel="shortcut icon" href="/agrimarket/favicon.png" type="image/x-icon">

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="/agrimarket/style.css">


    <!-- CSS PLUGINS -->

    <link rel="stylesheet" href="/agrimarket/assets/plugins/fontawesome.css">
    <link rel="stylesheet" href="/agrimarket/assets/plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="/agrimarket/assets/plugins/owl.theme.default.min.css">


    <!-- SCRIPT PLUGINS -->

    <script src="/agrimarket/assets/plugins/jquery.min.js"></script>
    <script src="/agrimarket/assets/plugins/fontawesome.js"></script>
    <script src="/agrimarket/assets/plugins/owl.carousel.min.js"></script>
</head>
<body>

    <div class="topbar">

        <div class="actions">

            <?php
                getFarmerUsername();
            ?>
            
        </div>

    </div>

    <div class="navbar flex row-between">
        
        <div class="navlinks">
            <a href="index.php" class="logo">
                <img src="/agrimarket/favicon.png" alt="logo" class="logo-img">
                <span class="logo-text">AgriMarket</span>
            </a>

            <a href="index.php" class="navlink active">home</a>
            <a href="product.php" class="navlink">my products</a>
            <a href="orders.php" class="navlink">orders</a>
        </div>

        <div class="nav-actions">

            <a href="new.php" class="nav-cart">
                <div class="icon"><i class="fas fa-plus"></i></div>
                <span>add product</span>
            </a>

        </div>

    </div>
