<?php
session_start();

// Initialize cart session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect user information from form
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $paymentMethod = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);

    // Ensure the cart is not empty
    if (!empty($_SESSION['cart']) && $name && $address && $paymentMethod) {
        // Process the order (e.g., save to database)
        $conn = new mysqli("localhost", "root", "", "shoe_store");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert order details into database
        $stmt = $conn->prepare("INSERT INTO orders (name, address, payment_method) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $address, $paymentMethod);
        if ($stmt->execute()) {
            $orderId = $stmt->insert_id;

            // Insert order items into database
            $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_price, quantity) VALUES (?, ?, ?, ?, ?)");
            foreach ($_SESSION['cart'] as $item) {
                $stmt->bind_param("iisdi", $orderId, $item['productID'], $item['productName'], $item['productPrice'], $item['quantity']);
                $stmt->execute();
            }
            $stmt->close();
            $conn->close();

            // Clear the cart
            $_SESSION['cart'] = [];

            // Redirect to a thank you page
            header("Location: thank_you.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>
