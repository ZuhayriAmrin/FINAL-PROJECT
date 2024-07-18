<?php
session_start();

// Add item to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Create a new cart item array
    $cart_item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1
    );

    // Add the cart item to the session
    $_SESSION['cart'][] = $cart_item;

    // Debug: print the cart contents
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";

    // Redirect back to cart page
    header('Location: cart.php');
    exit;
}
?>