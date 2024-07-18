<?php
session_start();
require 'Connection.php';

$OrderID = $_POST['OrderID'];
$ProductQuantity = $_POST['Quantity'];

$sql = "UPDATE tbl_orders SET Quantity = '$ProductQuantity' WHERE OrderID = '$OrderID'";
$result = mysqli_query($Conn, $sql);

if ($result) {
    echo "Quantity updated successfully!";
} else {
    echo "Error updating quantity: " . mysqli_error($Conn);
}

?>