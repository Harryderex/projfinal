<?php include("includes/header.php") ?>
<?php
            global $conn;
            if (isset($_GET['cat_id'])) {
            $product_cat = $_GET['cat_id'];
            $query = "SELECT * FROM categories WHERE cat_id =" .$product_cat;
            $run_query = mysqli_query($conn, $query);
            if ($run_query) {
                while ($row = mysqli_fetch_assoc($run_query)) {
                    $cat_title =  $row['cat_title'];
                    $cat_image =  $row['cat_image'];
                    $cat_id =     $row['cat_id'];
                    $cat_description = $row['cat_description'];
                    $path = "/agrimarket/farmer/product_images/". $cat_image;

                }
                    
                }
            }
?>

    <div class="beginner">

        <div class="breadcrumbs" style="margin-bottom: 20px;">
            <a href="index.php" class="crumb">home</a>
            <i class="icon fas fa-angle-right"></i>
            <a href="market.php" class="crumb">marketplace</a>
            <i class="icon fas fa-angle-right"></i>
            <a href="#" class="crumb"><?php echo $cat_title ?></a>
        </div>

        <div class="intro">

            <div class="heading"><?php echo $cat_title ?></div>
            <div class="emphasis">
                <?php
                    echo $cat_description;
                ?>
            </div>

        </div>

    </div>

    <div class="product-list">

       <?php
            categorizedProducts()
       ?>

    </div>

    <div class="sectioned">
        
        <div class="heading">Discounted crops</div>

        <div class="product-list owl-theme owl-carousel" id="productList">

            <div class="product">
    
                <div class="product-image"><img src="assets/img/bagofrice.jpg" alt=""></div>
    
                <div class="product-details">
                    <div class="name">Rice</div>
                    <div class="measure">sold in bags</div>
                    <div class="price">#30,600 <span class="old">#34,000</span></div>
                </div>
    
                <div class="discount">10%</div>

                <div class="product-end">
                    <a href="#" class="button">view </a>
                    <a href="#" class="button">add to cart <i class="icon fas fa-shopping-cart"></i></a>
                </div>
    
            </div>
    
        </div>

    </div>

    
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