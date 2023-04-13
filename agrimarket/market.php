
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

            <form action="" method="post" class="searchbar">
                <input type="search" name="" id="" placeholder="Type in what you need">
                <button type="submit"><i class="fas fa-search"></i></button>
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

    
    <div class="Topper">
        <div class="inside">

            <div class="topper-content">
                <div class="header">Our marketplace</div>
                <div class="emphasis">

                </div>
            </div>
            
        </div>
    </div>

    <div class="sectioned">
        
        <div class="heading">Explore by categories</div>

        <div class="cat-list">

            <?php
                    categories();
            ?>

        </div>

    </div>

    <div class="sectioned">
        
        <div class="heading">Discounted products</div>

        <div class="product-list owl-theme owl-carousel" id="productList">

        <?php
                getAllProduct();
        ?>

        </div>

    </div>

    
    

    <script>
    $('.product-form').submit(function(event) {
    event.preventDefault();

    // Get the form data
    var formData = $(this).serialize();

    // Send the AJAX request
    $.ajax({
            type: 'POST',
            url: 'add-to-cart.php',
            data: formData,
            success: function(data) {
                alert('Item added to cart!');
            },
            error: function() {
                alert('Error adding item to cart!');
            }
        });
    });



    </script>
    <script>
        $(document).ready(function(){
            $('#productList').owlCarousel({
                margin:15,
                loop:false,
                items:5,
            })
        })
    </script>

</body>
</html>