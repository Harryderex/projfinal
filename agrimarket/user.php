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
            <a href="market.php" class="navlink ">Explore our marketplace</a>
            <a href="seller.php" class="navlink active">Meet our sellers</a>
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
                        echo 1; 
                    }
                    ?>
                </span>
            </div>
                <span class="cart-item" id="cart-container">cart</span>
            </a>

        </div>

    </div>

    

    <div class="beginner">

        <div class="breadcrumbs" style="margin-bottom: 20px;">
            <a href="index.php" class="crumb">home</a>
            <i class="icon fas fa-angle-right"></i>
            <a href="seller.php" class="crumb">our sellers</a>
        </div>

    </div>
    
    <?php
        include("./includes/config.php");
        $user_id = $_SESSION['user_id'];
        global $conn;
        if (isset($_GET['id'])) {
             $prod_id = $_GET['id'];
             $query = "SELECT * from sellers where id=" . $prod_id;
             $run_query = mysqli_query($conn, $query);
             $resultCheck = mysqli_num_rows($run_query);    
             if ($resultCheck > 0) {
                  while ($rows = mysqli_fetch_array($run_query)) {
                       $fullname = $rows['fullname'];
                       $email = $rows['email'];
                       $number = $rows['number'];
                       $seller_image = $rows['seller_image'];
                    echo"
                    <div class='user'>
                
                        <div class='top'>
                
                            <div class='user-intro'>
                
                                <div class='first'>
                                    <div class='name'>$fullname</div>
                                    <div class='type'>Individual</div>
                                    <div class='location'><i class='icon fas fa-map-marker-alt'></i> Port Harcourt</div>
                                </div>
                
                                <div class='user-description'>
                
                                    <div class='heading'>About $fullname</div>
                    
                                    <div class='emphasis'>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum veniam tempora aliquam aperiam, 
                                        numquam minima libero modi tenetur impedit dolorum error eos accusantium. Aliquid illo eligendi 
                                        magni maxime, illum libero.
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum veniam tempora aliquam aperiam, 
                                        numquam minima libero modi tenetur impedit dolorum error eos accusantium. Aliquid illo eligendi 
                                        magni maxime, illum libero.
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum veniam tempora aliquam aperiam, 
                                        numquam minima libero modi tenetur impedit dolorum error eos accusantium. Aliquid illo eligendi 
                                        magni maxime, illum libero.
                                    </div>
                    
                                </div>
                
                            </div>
                
                            <div class='user-image'><img src='assets/img/$seller_image' alt='Image Not Found'></div>
                
                        </div>
                ";
                  }
                }
            }
   
    ?>

        <div class="end">

            <div class="header">My products</div>

            <div class="product-list">
            
            <?php
                    include("./includes/config.php");
                    if (isset($_SESSION['user_id'])) {
                         $user_id = $_SESSION['user_id'];
                         getSellerProducts();
                    } else {
                         echo "<br><br><h1 align = center>Please Login!</h1><br><br><hr>";
                    }
            ?>

            </div>

        </div>
    </div>

</body>
</html>