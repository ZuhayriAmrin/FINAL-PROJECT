<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "shoe_store");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$_un = $_POST['Username'];
$_pass = $_POST['Password'];
$_Role = $_GET['Role'];

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM `tbl_customers` WHERE `Username` = ? AND `Password` = ? AND `Role` = ?");
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}

// Bind the parameters
$stmt->bind_param("sss", $_un, $_pass, $_Role);

// Execute the query
$stmt->execute();

// Get the result
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if ($row) {
    if ($_Role == "User") {
        $_SESSION["Username"] = $_un;
        $_SESSION["Password"] = $_pass;
        echo "<script>window.open('index.php','_self',null,true)</script>";
        die("Logged in");
    } else if ($_Role == "Admin") {
        $_SESSION['Admin'] = "Logged";
        echo "<script>window.open('Management_Orders.php','_self',null,true)</script>";
    }
} else {
    die("Wrong username or password");
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
