<?php
    session_start();
    require_once "./includes/config.php";
    $cartId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $query = "SELECT * FROM product WHERE product_id='$cartId'";
    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_assoc($result);
    $product_id = $rows['product_id'];
    $product_title = $rows['product_name'];
    $product_price = $rows['product_price'];

    $que = "INSERT INTO cart(product_id,product_name,qty,subtotal) VALUES ('$product_id','$product_title','$qu','$product_price ')";
    $res = mysqli_query($conn,$que);

    // Make name field unique In database table to cheak this condition
    if($res != true){
        echo "This ".$name." "."Is Already In Your Cart";
    }
    
?>
