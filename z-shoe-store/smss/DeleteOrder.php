<?php
session_start();

// Check if orderID is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $orderID = $_GET['id'];
    
    // Perform deletion logic (Example: Execute DELETE query)
    require 'Connection.php'; // Adjust this according to your actual connection script

    $sql = "DELETE FROM tbl_orders WHERE OrderID = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->bind_param("i", $orderID);
    
    if ($stmt->execute()) {
        // Redirect back to the cart page after deletion
        header("Location: cart.php");
        exit();
    } else {
        echo "Error deleting order: " . $stmt->error;
    }

    $stmt->close();
    $Conn->close();
} else {
    echo "Invalid order ID.";
}
?>
