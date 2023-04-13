<?php include("includes/header.php") ?> 
<?php include("includes/config.php")?>

    <div class="new">
        <div class="header">add a new product</div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="newProduct" enctype="multipart/form-data">
    
            <div class="part">
                <div class="title">product title</div>
                <input type="text" name="product_title" id="product_title" placeholder="enter product title" required>
            </div>

            <div class="part">
                <div class="title">product stock</div>
                <input type="text" name="product_stock" id="product_stock" placeholder="Enter amount of product stock" required>
            </div>

            <div class="part mini">
                <div class="title">Product Categories</div>
                <select name="product_cat" id="product_cat" required>
                <?php
                    $get_cats = "select * from categories";
                    $run_cats =  mysqli_query($conn, $get_cats);
                    while ($row_cats = mysqli_fetch_array($run_cats)) {
                        $cat_id = $row_cats['cat_id'];
                        $cat_title = $row_cats['cat_title'];
                        echo "<option value='$cat_id'>$cat_title</option>";
                    }
                ?>
                </select>
            </div>

            <div class="part">

                <div class="title">product type</div>
                <input type="text" name="product_type" id="product_type" placeholder="Example: potato" required>
            </div>

            <div class="part">
                <div class="title">product image</div>
                <input type="file" name="product_image" id="product_image" required>
            </div>

            <div class="part">
                <div class="title">product MRP</div>
                <input type="text" name="product_price" id="product_price" placeholder="Enter product price">
            </div>

            <div class="part">
                <div class="title">product description</div>
                <textarea name="product_desc" id="product_desc" required></textarea>
            </div>

            <div class="part">
                <div class="title">product keywords</div>
                <input type="text" name="product_keywords" id="product_keywords" required placeholder="Example: potato, yam, tubers">
            </div>

            <button type="submit" name="submit"  class="pop">Insert product</button>

        </form>
    </div>
    
    <script src="../assets/js/script.js"></script>
</body>
</html>


<?php
if (isset($_POST['submit'])) {    // when button is clicked

    // getting the text data from fields
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_type = $_POST['product_type'];
    $product_stock = $_POST['product_stock'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    global $conn;
    // getting image
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];  // for server

    if (isset($_SESSION['user_id'])) {
        move_uploaded_file($product_image_tmp, "./product_images/$product_image");
        $user_id = $_SESSION['user_id'];
        $getting_id = "SELECT * FROM sellers WHERE id = $user_id";
        $run = mysqli_query($conn, $getting_id);
        $row = mysqli_fetch_array($run);
        $id = $row['id'];



        $insert_product = "INSERT INTO products (farmer_fk,product_title, product_cat, 
                                product_type,product_image, product_stock, product_price,
                                product_desc,  product_keywords) 
                                VALUES ('$id','$product_title','$product_cat','$product_type','$product_image','$product_stock',
                                        '$product_price','$product_desc',
                                        '$product_keywords')";

        $insert_query = mysqli_query($conn, $insert_product);
        echo $insert_product;
        if ($insert_query) {
            echo "<script>alert('Product has been added')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        } else {
            echo "<script>alert('Error Uploading Data Please Check your Connections ')</script>";
        }
    }
}
