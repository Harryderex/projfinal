<?php

session_start();

include("config.php");


    function getFarmerUsername()
    {
        if(empty($_SESSION["user_id"])) // if user is not login
        {
            echo "<a href = '../login.php' class='cta-link  '>Login  </a>";
            echo "<a href= '../register.php' class='cta-link'>Register</a>";
        } else {
            $email = $_SESSION['user_email'];
            global $conn;

            $query = "SELECT * FROM sellers WHERE email = '" . $email. "'";
            $run_query = mysqli_query($conn, $query);
            if ($run_query) {
                while ($row_cat = mysqli_fetch_array($run_query)) {
                    $seller_name = $row_cat['fullname'];
                    $seller_name = 'Hello ' . $seller_name;
                }   

                // echo @"<label>$buyer_name</label>";
                echo $seller_name;
                include("dropdown.php");
            }
        }
    }

    
    //function which is link with seller homePage
    function getSellerProducts()
    {
        
        include("config.php");
        global $conn;
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM products WHERE farmer_fk =$user_id ";
        $run_query = mysqli_query($conn, $query);
        $count = 0;
        if ($run_query) {
            while ($row = mysqli_fetch_assoc($run_query)) {
                $count = $count + 1;
                $product_title =  $row['product_title'];
                $image =  $row['product_image'];
                $price =  $row['product_price'];
                $id =     $row['product_id'];
                $product_image = $row['product_image'];
                $path = "../product_images/". $image;

                    echo "
                    <div class='product'>
        
                        <div class='product-image'><img src='/agrimarket/farmer/product_images/$product_image' alt='Image Not Available'></div>
        
                        <div class='product-details'>
                            <div class='name'>$product_title</div>
                            <div class='price'>₦$price</div>
                        </div>
        
                        <div class='product-end alt'>
                            <a href='viewproduct.php?id=$id' class='button'>view </a>
                        </div>
        
                    </div>";
            }
        } else {
            echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
        }
    }

    


?>