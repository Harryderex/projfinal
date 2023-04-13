<?php

session_start();

include("config.php");

    function getUsername()
    {    
        if(empty($_SESSION["user_id"])) // if user is not login
        {
            echo "<a href = 'login.php' class='cta-link'>Login  </a>";
            echo "<a href= 'register.php' class='cta-link'>Register</a>";
        } else {
            $email = $_SESSION['user_email'];
            global $conn;

            $query = "SELECT * FROM buyers WHERE email = '" . $email. "'";
            $run_query = mysqli_query($conn, $query);
            if ($run_query) {
                while ($row_cat = mysqli_fetch_array($run_query)) {
                    $buyer_name = $row_cat['fullname'];
                    $buyer_name = 'Hello '. $buyer_name;
                }   

                // echo @"<label>$buyer_name</label>";
                 echo $buyer_name;
                include("dropdown.php");
            }
        }
    }

    function getFarmerUsername()
    {
        if(empty($_SESSION["user_id"])) // if user is not login
        {
            echo "<a href = '../login.php' class='cta-link'>Login  </a>";
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
                echo @"<div class='cta-link'>$seller_name</div>";
            }
        }
    }

    function seller(){
        global $conn; 
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM sellers ";
        $run_query = mysqli_query($conn,$query);
        $count = 0;
          
        if($run_query){
            while($row = mysqli_fetch_assoc($run_query)){
                $count = $count + 1;
                $id = $row['id'];
                $fullname = $row['fullname'];
                $seller_image = $row['seller_image'];
                echo"
                <div class='cat'>
                <div class='cat-img'><img src='assets/img/$seller_image' alt='Image Not Available'></div>

                <a href='user.php?id=$id' class='cat-text'>
                    <span class='txt'>$fullname</span>
                    <span class='icon'><i class='fas fa-arrow-right'></i></span>
                </a>
                </div>";
            }
            
        }
    }
    

    
    //function which is link with seller homePage
    function getSellerProducts()
    {
        include("config.php");
        global $conn;
        $user_id = $_SESSION['user_id'];
        if (isset($_GET['id'])) {
            $prod_id = $_GET['id'];
        $query = "SELECT * FROM products WHERE farmer_fk =$prod_id ";
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
                $path = "/agrimarket/farmer/product_images/". $image;

                    echo "
                    <div class='product'>
        
                        <div class='product-image'><img src='/agrimarket/farmer/product_images/$product_image' alt='Image Not Available'></div>
        
                        <div class='product-details'>
                            <div class='name'>$product_title</div>
                            <div class='price'>₦$price</div>
                        </div>
        
                        <div class='product-end'>
                            <a href='viewproduct.php?id=$id' class='button'>view </a>
                                <a href='#' class='button'>add to cart <i class='icon fas fa-shopping-cart'></i></a>
                        </div>
        
                    </div>";
            }
        } else {
            echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
        }
    }
    }    



        // getAll Product
    function getAllProduct() {
            include("config.php");
            global $conn;
            $query = "SELECT * FROM products";
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
                    $path = "/agrimarket/farmer/product_images/". $image;
                    
                    echo "                      
                    <div class='product product-form'>
            
                        <div class='product-image'><img src='/agrimarket/farmer/product_images/$product_image' alt='Image Not Available'></div>
        
                        <div class='product-details'>
                            <div class='name'>$product_title</div>
                            <div class='price'>₦$price</div>
                            <div>
							Qty :
							<select name='product_qty'>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
							</select>
						</div>
                        </div>

                        <div class='product-end'>
                            <a href='viewproduct.php?id=$id' class='button'>view </a>
                            <a href='#' name='product_code' class='button' data-id= ".$row['product_id']." value= ".$row['product_code']." data-proname=". $product_title.">add to cart <i class='icon fas fa-shopping-cart'></i></a>

                        </div>
        
                    </div>";



                 }
                 
       
            }else {
                echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
            }
            
    }

    
    function cartItem(){

        if(!empty($_SESSION["cart_item"])){
            $count = count($_SESSION["cart_item"]);
        } else {
            $count = 0; 
        }
    }

    function cartDetails(){
        
    }

    function viewProductDetails(){
        include("config.php");
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
   
                       if ($product_stock == 0) {
                            $str = "Not In Stock";
                       } else {
                            $str = "In Stock";
                       }
   
                       $space = "....";
                       echo "    
                        <div class='product-tab'>
            
                            <div class='col' id='add-item-bag' style='width:100%;'></div>

                            <div class='product-images'>
                        
                                    <div class='main-image'><img src='/agrimarket/farmer/product_images/$product_image' alt='Image Not Available'></div>
                        
                                </div>
                        
                                <div class='product-info'>
                                    
                                    <div class='top'>
                                        <div class='name'>$product_title</div>
                                        <div class='measure'>$product_type</div>
                                    </div>
                        
                                    <div class='mid'>
                        
                                        <div class='price'>₦$product_price</div>
                                        <div class='cta-link'>$str</div>
                                        
                                        <div class='cta-link'>Stock: ".$product_stock." remaining</div>
                                        <div class='description'>
                        
                                            <div class='heading'>product details</div>
                        
                                            <div class='emphasis'>
                                            " . $space . $product_description . "
                                            </div>
                        
                                        </div>
                        
                                    </div>
                        
                                    <div class='end'>
                                        <div class='stand'>
            
                                            <div class='increase'>
                                                <div class='icon qt-minus'>-</div>
                                                <div class='number qt'>1</div>
                                                <div class='icon qt-plus'>+</div>
                                            </div>                                
                                        </div>
            
                                        <div class='fall'>
                                            <div class='button atc'><i class='icon fas fa-shopping-cart'></i> <span>Add to cart</span></div>
                                            <div class='button save'><i class='icon fas fa-bookmark'></i></div>
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
    }

    function viewProducts(){
        
    }

    function categorizedProducts(){
        include("config.php");
        global $conn;
        if (isset($_GET['cat_id'])) {
            $product_cat = $_GET['cat_id'];
            $query = "SELECT * from products where product_cat =" . $product_cat;
            $run_query = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($run_query);
            $count = 0;
            if ($resultCheck > 0) {
                 while ($row = mysqli_fetch_array($run_query)) {
                    $count = $count + 1;
                    $product_title =  $row['product_title'];
                    $image =  $row['product_image'];
                    $price =  $row['product_price'];
                    $id =     $row['product_id'];
                    $product_image = $row['product_image'];
                    $path = "/agrimarket/farmer/product_images/". $image;

                    echo "
                    <div class='product'>
        
                        <div class='product-image'><img src='/agrimarket/farmer/product_images/$product_image' alt='Image Not Available'></div>
        
                        <div class='product-details'>
                            <div class='name'>$product_title</div>
                            <div class='price'>₦$price</div>
                        </div>
        
                        <div class='product-end'>
                            <a href='viewproduct.php?id=$id' class='button'>view </a>
                                <a href='#' class='button'>add to cart <i class='icon fas fa-shopping-cart'></i></a>
                        </div>
        
                    </div>";
            }
        } else {
            echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
        }
    }
}

    
    function categories(){
        include("config.php");
            global $conn;
            $query = "SELECT * FROM categories";
            $run_query = mysqli_query($conn, $query);
            $count = 0;
            if ($run_query) {
                while ($row = mysqli_fetch_assoc($run_query)) {
                    $count = $count + 1;
                    $cat_title =  $row['cat_title'];
                    $cat_image =  $row['cat_image'];
                    $cat_id =     $row['cat_id'];
                    $path = "/agrimarket/farmer/product_images/". $cat_image;
                    
                    echo "
                    <div class='cat'>
                        <div class='cat-img'><img src='assets/img/$cat_image' alt='Image not Found'></div>
        
                        <a href='category.php?cat_id=$cat_id' class='cat-text'>
                            <span class='txt'>$cat_title</span>
                            <span class='icon'><i class='fas fa-arrow-right'></i></span>
                        </a>
                    </div>";

                 }
                 
       
            }else {
                echo "<br><br><hr><h1 align = center>Categories Not Uploaded !</h1><br><br><hr>";
            }
     
    }
    // Checkout System Functions
    function cart()
    {
        if (isset($_SESSION['number'])) {
            if (isset($_GET['add'])) {

                global $conn;
                if (isset($_POST['quantity'])) {
                    $qty = $_POST['quantity'];
                } else {
                    $qty = 1;
                }
                $sess_phone_number = $_SESSION['number'];
                $product_id = $_GET['add'];

                $check_pro = "select * from cart where phonenumber = $sess_phone_number and product_id='$product_id' ";

                $run_check = mysqli_query($conn, $check_pro);

                if (mysqli_num_rows($run_check) > 0) {
                    echo "";
                } else {
                    $insert_pro = "insert into cart (product_id,phonenumber) values ('$product_id','$sess_phone_number')";
                    $run_insert_pro = mysqli_query($conn, $insert_pro);
                }

                echo "<script>window.open('bhome.php','_self')</script>";
            }
        } else {
            // echo "<script>alert('Please Login First! ');</script>";
        }
    }

    function totalItems()
    {
        global $conn;
        if (isset($_SESSION['number'])) {
            $sess_phone_number = $_SESSION['number'];

            $get_items = "select * from cart where phonenumber = '$sess_phone_number'";
            $run_items =  mysqli_query($conn, $get_items);
            $count_items =  mysqli_num_rows($run_items);
            return $count_items;
        } else {
            echo 0;
        }
    }


    function emptyCart()
    {
        global $con;
        $sess_phone_number = $_SESSION['phonenumber'];

        $get_items = "Delete from cart where phonenumber = '$sess_phone_number'";
        $run_items =  mysqli_query($con, $get_items);
        $count_items =  mysqli_num_rows($run_items);
    }


    function bestSeller()
    {
        global $con;
    }

              


?>
