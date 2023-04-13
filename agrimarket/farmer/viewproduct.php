<?php include("includes/header.php") ?>

    <div class="beginner">

        <div class="breadcrumbs">
            <a href="index.php" class="crumb">home</a>
            <i class="icon fas fa-angle-right"></i>
            <a href="product.php" class="crumb">My Product</a>

        </div>

    </div>


    <?php
     include("./includes/config.php");
     $user_id = $_SESSION['user_id'];
     // getFarmerProductDetails();
     global $conn;
     if (isset($_GET['id'])) {
          $prod_id = $_GET['id'];
          $query = "SELECT * from products where product_id=" . $prod_id;
          $run_query = mysqli_query($conn, $query);
          $resultCheck = mysqli_num_rows($run_query);
          if ($resultCheck > 0) {
               while ($rows = mysqli_fetch_array($run_query)) {
                    $product_title = $rows['product_title'];
                    $product_image = $rows['product_image'];
                    $product_type = $rows['product_type'];
                    $product_stock = $rows['product_stock'];
                    $product_description = $rows['product_desc'];
                    $product_price = $rows['product_price'];
                    $product_cat = $rows['product_cat'];

                    // echo "<div class='row'>
                    //         <div class='col col-md-6'>
                    //             <img src='../Admin/product_images/$product_image' class='rounded mx-auto d-block bord' style='float:left;' height='250px' width='300px' >
                    //             <h4>$product_type</h4>
                    //         </div>
                    //         <div class='col col-md-6'><br>
                    //           <h3 style='font-weight:bold;'>" . $product_title."</h3><br>"  
                    //             . " product type  :  " . $product_type."<br>" 
                    //             . " product stock  :  " . $product_stock."<br>"
                    //             . " product Description  :  " . $product_description."<br>" 
                    //             . " product price  :  " . $product_price."<br>" 
                    //             . " product Delivery  :  " . $product_delivery."<br>"
                    //             . " product category  :  " . $product_cat ."<br>".
                    //         "</div> </div>";
                    if ($product_stock == 0) {
                         $str = "Not In Stock";
                    } else {
                         $str = "In Stock";
                    }

                    $space = "....";
                    echo "    <div class='product-tab'>

                    <div class='product-images'>
            
                        <div class='main-image'><img src='./product_images/$product_image' alt='Image Not Available'></div>
            
                    </div>
            
                    <div class='product-info'>
                        
                        <div class='top'>
                            <div class='name'>$product_title</div>
                            <div class='measure'>$product_type</div>
                        </div>
            
                        <div class='mid'>
            
                            <div class='price'>$product_price</div>
                            <div class='cta-link'>$str</div>
            
                            <div class='description'>
            
                                <div class='heading'>product details</div>
            
                                <div class='emphasis'>
                                " . $space . $product_description . "
                                </div>
            
                            </div>
            
                        </div>
            
                        <div class='end'>
                            <div class='stand'>
                                <div class='tip'>$product_stock</div>
                            </div>
            
            
                        </div>
            
                    </div>
            
                </div>
            ";
               }
          }
     } else {
          echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
     }
     ?>



    
    <script>
        $(document).ready(function(){
            $('#productList').owlCarousel({
                margin:15,
                loop:true,
                items:5,
            })
        })
    </script>
</body>
</html>