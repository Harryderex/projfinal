<?php include("includes/header.php") ?>
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
                       $product_id = $rows['product_id'];
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
                            $str = "";
                       }
   
                       $space = "....";

?>

    <div class="beginner">

        <div class="breadcrumbs">
            <a href="index.php" class="crumb">home</a>
            <i class="icon fas fa-angle-right"></i>
            <a href="market.php" class="crumb">marketplace</a>
            <i class="icon fas fa-angle-right"></i>
            <a href= '<?php echo "category.php?cat_id=".$product_cat ?>' class="crumb"><?php echo $product_title ?></a>
        </div>
    
        <div class="col" id="add-item-bag" style="width:100%;"></div>

    </div>
    
            <div class='product-tab'>
            
                <div class='product-images'>
            
                        <div class='main-image'><img src= '<?php echo "/agrimarket/farmer/product_images/$product_image" ?>'  alt='Image Not Available'></div>
            
                    </div>
            
                    <div class='product-info'>
                        
                        <div class='top'>
                            <div class='name'><?php echo $product_title ?></div>
                            <div class='measure'><?php echo $product_type ?></div>
                        </div>
            
                        <div class='mid'>
            
                            <div class='price'><?php echo '₦'.$product_price ?></div>
                            <div class='cta-link'><?php echo $str ?></div>
                            
                            <div class='cta-link'>Stock:<?php echo $product_stock ?> remaining</div>
                            <div class='description'>
            
                                <div class='heading'>product details</div>
            
                                <div class='emphasis'>
                                <?php echo $space .''. $product_description ?>
                                </div>
            
                            </div>
            
                        </div>
            
                        <div class='end'>
                            <div class='stand'>

                                <div class='increase'>
                                    <div class='icon qt-minus'>-</div>
                                    <input type='ext' class='number product-quantity' id='qty-". $product_id." name='quantity' value='1' size='1' />
                                    <div class='icon qt-plus'>+</div>
                                </div>                                
                            </div>

                            <div class='fall'>
                                <div class='button atc'><i class='icon fas fa-shopping-cart'></i> <span id='add' data-id= '<?php echo $rows['product_id'] ?>' data-proname= '<?php echo $product_title ?>' >Add to cart</span></div>
                                <div class='button save'><i class='icon fas fa-bookmark'></i></div>
                            </div>            
            
                        </div>
            
                    </div>
            
                </div>
            <?php
               }
          }
     } else {
          echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
     }
     ?>
     
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function(){
                $(document).on("click","#add",function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    var price = $(this).data('price');
                    var qty = jQuery('#qty-'+id).val();
                    var product_title = $(this).data('proname');
                    $.ajax({
                        url : 'cart_insert_data.php',
                        type : 'POST',
                        contentType: "application/json; charset=utf-8",
                        data : {product_id:id, quantity:qty},
                        success : function(data) {
                            jQuery("#add-item-bag").html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> You have added <strong>'+product_title+'</strong> to your shopping cart!</div>');
                            $("#cart-container").html(data.products);
                            setTimeout(function () { window.location = "cart.php"; }, 2000); 
                            
                        }
                    });
                });
            });
    </script>
    <script src="./assets/js/script.js"></script>
    

    
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