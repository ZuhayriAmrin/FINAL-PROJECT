<?php
session_start();

// Ensure cart exists and is not empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty! Please add some items to your cart first.'); window.open('cart.php', '_self');</script>";
    exit;
}

// Ensure user is logged in (adjust as per your authentication logic)
if (empty($_SESSION['Username']) || empty($_SESSION['Password'])) {
    echo "<script>alert('Please login to proceed with checkout.'); window.open('Login.php?Role=User', '_self');</script>";
    exit;
}

// Process checkout and place order
if (isset($_POST['checkout'])) {
    require 'Connection.php';

    // Assuming you have CustomerID and other necessary details in session or form inputs
    $customerID = $_SESSION['CustomerID']; // Example, adjust as per your session structure
    $dateOrdered = date("Y-m-d");

    // Insert orders into database
    foreach ($_SESSION['cart'] as $item) {
        $productID = $item['id'];
        $productSize = ''; // Add logic to get product size from cart if needed
        $productColor = ''; // Add logic to get product color from cart if needed
        $quantity = $item['quantity'];

        $sqlInsertOrder = "INSERT INTO tbl_orders (ProductID, CustomerID, Size, Color, Quantity, DateOrdered) " .
                          "VALUES ('$productID', '$customerID', '$productSize', '$productColor', '$quantity', '$dateOrdered')";
        $resultInsertOrder = mysqli_query($Conn, $sqlInsertOrder);

        // Update product quantity in tbl_products
        $sqlUpdateProduct = "UPDATE tbl_products SET Quantity = Quantity - $quantity WHERE ProductID = '$productID'";
        $resultUpdateProduct = mysqli_query($Conn, $sqlUpdateProduct);

        // Check if order and product update were successful
        if (!$resultInsertOrder || !$resultUpdateProduct) {
            // Handle error, rollback transaction if needed
            echo "<script>alert('Failed to place order. Please try again later.'); window.open('cart.php', '_self');</script>";
            exit;
        }
    }

    // Clear the cart after successful checkout
    unset($_SESSION['cart']);
    echo "<script>alert('Order placed successfully!'); window.open('index.php', '_self');</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Add your CSS links and styles here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <!-- Add your HTML content for checkout page -->
    <div class="container">
        <h2>Checkout</h2>
        <div>
            <h3>Order Summary</h3>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <li><?php echo $item['name']; ?> (<?php echo $item['price']; ?>) x <?php echo $item['quantity']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <form action="" method="POST">
            <!-- Add any additional fields needed for checkout -->
            <button type="submit" name="checkout" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>

    <!-- Add your JavaScript libraries and scripts here -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        // Add any custom JavaScript here if needed
    </script>
</body>

</html>