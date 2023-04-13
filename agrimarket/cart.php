<?php include("includes/header.php") ?>


          <?php
          $total = 0;
          global $conn;
          if (isset($_SESSION['user_id'])) {
               $user_id = $_SESSION['user_id'];
               $sel_price = "select * from cart where phonenumber = '$user_id'";
               $run_price = mysqli_query($conn, $sel_price);

               $qtycart = array();
               $i = 0;
               while ($p_price = mysqli_fetch_array($run_price)) {
                    $product_id = $p_price['product_id'];
                    $_SESSION['qtycart'][$i] = $p_price['qty'];

                    $pro_price = "select * from products where product_id='$product_id'";
                    $run_pro_price = mysqli_query($conn, $pro_price);
                    while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                         $product_title = $pp_price['product_title'];
                         $product_price = $pp_price['product_price'];
                         $product_image = $pp_price['product_image'];
                         $subtotal = $_SESSION['qtycart'][$i] * $product_price; ?>


                <div class="unit">

                    <div class="top">
                        <div class="first">
                            <div class="unit-image"><img src="/agrimarket/farmer/product_images/<?php $product_image?>" alt=""></div>
    
                            <div class="unit-details">
                                <div class="unit-name"><?php echo $product_title; ?></div>
                                <div class="unit-seller">Seller: <b>Victor</b></div>
                            </div>
                        </div>
    
                        <div class="last">
                            <div class="unit-price price">₦<?php echo $product_price; ?></div>
                        </div>
                    </div>

                    <div class="end">

                        <div class="removal"><i class="icon fas fa-trash-alt"></i> remove</div>

                        <div class="increase">
                            <div class="icon qt-minus">-</div>
                            <div class="number qt">1</div>
                            <div class="icon qt-plus">+</div>
                        </div>

                    </div>

                </div>

                              <?php $subtotal = $_SESSION['qtycart'][$i] * $product_price; ?>
                              <?php
                              $subquery = "update cart set subtotal = $subtotal where product_id = $product_id";
                              $run = mysqli_query($conn, $subquery);
                              ?>
                              <?php $total = $total + $subtotal ?>

          <?php
                    }
                    $i++;
               }
          } else {
               echo "<h1 align = center>Please Login First!</h1><br><br><hr>";
          } ?>
     


    <div class="cart">

        <div class="insider">
            <div class="header">cart</div>

            <div class="content">

                

                <div class="unit">

                    <div class="top">
                        <div class="first">
                            <div class="unit-image"><img src="assets/img/bagofrice.jpg" alt=""></div>
    
                            <div class="unit-details">
                                <div class="unit-name">rice</div>
                                <div class="unit-measure">sold in bags</div>
                                <div class="unit-seller">Seller: <b>Victor</b></div>
                            </div>
                        </div>
    
                        <div class="last">
                            <div class="unit-price price">₦30,600</div>
                            <div class="unit-discount">
                                <div class="percent">-10%</div>
                                <div class="old">₦34,000</div>
                            </div>
                        </div>
                    </div>

                    <div class="end">

                        <div class="removal"><i class="icon fas fa-trash-alt"></i> remove</div>

                        <div class="increase">
                            <div class="icon qt-minus">-</div>
                            <div class="number qt">1</div>
                            <div class="icon qt-plus">+</div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="summary">
            <div class="heading">cart summary</div>

            <div class="fact">
                <div class="title">Rice </div>
                <div class="pointer full-price">₦30,600</div>
            </div>

            <div class="fact">
                <div class="title">Rice </div>
                <div class="pointer full-price">₦30,600 </div>
            </div>
            
            <div class="calc">
                <div class="title">Subtotal</div>
                <div class="actu subtotal"><span>₦30,600</span></div>
            </div>

            <a href="checkout.php" class="button">checkout</a>
        </div>

    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="./assets/js/script.js"></script>
    <script>
        $(document).ready(function(){
    $(document).on("click","#remove",function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajax({
                        url : 'cart_data_delete.php',
                        type : 'POST',
                        data : {cart_id:id},
                        success : function(data) {
                            lodetable();
                            alert("Data Deleted Successfully");
                        }
                    });
                });
            });
    </script>
</body>
</html>