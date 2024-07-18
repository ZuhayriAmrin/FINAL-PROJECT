<?php
session_start();

if (isset($_GET['ProductID'])) {
    $productID = $_GET['ProductID'];

    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array
    }
}

header("Location: cart.php");
exit();
?>
