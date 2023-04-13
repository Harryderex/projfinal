<?php include("includes/header.php") ?>

	<?php
				
				if (isset($_POST["search"])){
					$valuetosearch = mysqli_real_escape_string($conn, trim($_POST["searchvalue"]));
					$sql = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_desc` LIKE '%$valuetosearch%' OR `product_type` LIKE '%$valuetosearch%' ");
					$count = 0;
					$c = mysqli_num_rows($sql);
		?>
    <div class="wishlist">

        <div class="header"><?php echo $c ?> products found</div>

        <?php				
                    if($c){				
					while ($row  = mysqli_fetch_array($sql)){
                        $count = $count + 1;
                        $product_title =  $row['product_title'];
                        $image =  $row['product_image'];
                        $price =  $row['product_price'];
                        $id =     $row['product_id'];
                        $product_image = $row['product_image'];
   
			?>

            <div class="product-list">

                <div class="product">

                <div class='product-image'><img src=<?php echo '/agrimarket/farmer/product_images/'.$product_image ?> alt='Image Not Available'></div>
                
                <div class='product-details'>
                    <div class='name'><?php $product_title ?></div>
                    <div class='price'><?php echo "₦".$price ?></div>
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
                    <a href='viewproduct.php?id=<?php $id?>' class='button'>view </a>
                    <a href='#' name='product_code' class='button' data-id= <?php $row['product_id'] ?> value= <?php $row['product_code'] ?> data-proname= <?php $product_title ?> >add to cart <i class='icon fas fa-shopping-cart'></i></a>

                </div>

            </div>
        </div>

            <?php

                }

            }else {
            echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
            }
       }
            ?>

    </div>

    <div class="wishlist">

<div class="header">my wishlist</div>

<div class="product-list">

<div class="product">

    <div class="product-image"><img src="assets/img/bagofrice.jpg" alt=""></div>

    <div class="product-details">
        <div class="name">Rice</div>
        <div class="measure">sold in bags</div>
        <div class="price">#34,000</div>
    </div>

    <div class="product-end">
        <a href="view.html" class="button">view </a>
        <a href="#" class="button">add to cart <i class="icon fas fa-shopping-cart"></i></a>
    </div>

</div>

<div class="product">

    <div class="product-image"><img src="assets/img/bagofrice.jpg" alt=""></div>

    <div class="product-details">
        <div class="name">Rice</div>
        <div class="measure">sold in bags</div>
        <div class="price">#34,000</div>
    </div>

    <div class="product-end">
        <a href="#" class="button">view </a>
        <a href="#" class="button">add to cart <i class="icon fas fa-shopping-cart"></i></a>
    </div>

</div>

<div class="product">

    <div class="product-image"><img src="assets/img/bagofrice.jpg" alt=""></div>

    <div class="product-details">
        <div class="name">Rice</div>
        <div class="measure">sold in bags</div>
        <div class="price">#34,000</div>
    </div>

    <div class="product-end">
        <a href="#" class="button">view </a>
        <a href="#" class="button">add to cart <i class="icon fas fa-shopping-cart"></i></a>
    </div>

</div>

</div>

</div>

    
    <script src="assets/js/script.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>