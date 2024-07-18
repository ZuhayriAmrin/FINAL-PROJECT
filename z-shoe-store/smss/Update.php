<?php
session_start();
require 'Connection.php';

$OrderID = $_POST['OrderID'];
$Quantity = $_POST['Quantity'];

$sql = "UPDATE tbl_orders SET Quantity = '$Quantity' WHERE OrderID = '$OrderID'";
$result = mysqli_query($Conn, $sql);

if ($result) {
    echo "<script>window.alert('Quantity updated successfully'); window.open('cart.php','_self',null,true);</script>";
} else {
    echo "<script>window.alert('Error updating quantity'); window.open('cart.php','_self',null,true);</script>";
}
?>