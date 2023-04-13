<?php
session_start();
include('includes/config.php');

#add products to cart
if(isset($_POST["product_code"])) {
        foreach($_POST as $key => $value){
            $product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }	
        $statement = $conn->prepare("SELECT product_title, product_price FROM products WHERE product_code= ? LIMIT 1");
        $statement->bind_param('s', $product['product_code']);
        $statement->execute();
        $statement->bind_result($product_name, $product_price);
        while($statement->fetch()){ 
            $product["product_title"] = $product_name;
            $product["product_price"] = $product_price;		
            if(isset($_SESSION["product"])){ 
                if(isset($_SESSION["product"][$product['product_code']])) {				
                    $_SESSION["product"][$product['product_code']]["product_qty"] = $_SESSION["product"][$product['product_code']]["product_qty"] + $_POST["product_qty"];				
                } else {
                    $_SESSION["product"][$product['product_code']] = $product;
                }			
            } else {
                $_SESSION["product"][$product['product_code']] = $product;
            }	
        }	
         $total_product = count($_SESSION["product"]);
        die(json_encode(array('product'=>$total_product)));
    }
    
?>