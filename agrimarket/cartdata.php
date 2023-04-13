<?php
session_start();

//Add item to cart
// Check if the product ID and quantity are set
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

//store shopping cart into database 
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Loop through the cart items
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        // Insert the item into the database
        $stmt = $pdo->prepare("INSERT INTO cart (product_id, quantity) VALUES (:product_id, :quantity)");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->execute();
    }

    // Clear the cart
    $_SESSION['cart'] = array();
}
