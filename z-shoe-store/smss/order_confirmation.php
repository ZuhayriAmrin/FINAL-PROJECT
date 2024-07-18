<?php
session_start();
require 'db_connect.php';

if (!isset($_GET['order_id'])) {
    header("Location: index.php");
    exit;
}

$order_id = $_GET['order_id'];

$query = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

$query = "SELECT * FROM order_items WHERE order_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order_items = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Order Confirmation</h1>
    <p>Thank you for your order. Your order ID is <?php echo $order['id']; ?>.</p>
    <h2>Order Details</h2>
    <p>Total: $<?php echo $order['total']; ?></p>
    <h3>Items:</h3>
    <?php
    foreach ($order_items as $item) {
        echo "<p>{$item['quantity']} x Product ID: {$item['product_id']} - \${$item['price']}</p>";
    }
    ?>
    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>