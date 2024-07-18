<!DOCTYPE html>
<html lang="en">

<head>
    <style>
<?php
session_start();

// Initialize cart array if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add item to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Check if the product already exists in cart
    $item_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] += 1;
            $item_exists = true;
        }
    }

    // If product is new to cart, add it as a new item
    if (!$item_exists) {
        $cart_item = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        );
        $_SESSION['cart'][] = $cart_item;
    }
}

// Function to display cart contents
function displayCart() {
    echo "<h2>Cart Contents:</h2>";
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>{$item['name']} ({$item['price']}) x {$item['quantity']}</li>";
    }
    echo "</ul>";
}
?>

        .button {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button1 {
            background-color: #04AA6D;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cart</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <img src="ZACK.png" width="130" height="120" alt="ZACK SHOES SHOP" align="left">
    <marquee><font size=7> WELCOME TO ZACK SHOE SHOP</font></marquee>
    <div class="address-bar"><strong>Affordable</strong> Shoes for Everyone</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Zack Shoe Shop</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="bestseller.php">Best Sellers</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#" onclick="ManagementOnclick();">Management</a></li>
                    <li><a href="cart.php">Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Cart</h2>
                    <hr>
                    <div class="table-responsive">
                        <table border="5px" class="table">
                            <tr style="text-align: center; color: Black; font-weight: bold;">
                                <td>Order ID</td>
                                <td>Customer ID</td>
                                <td>Product Name</td>
                                <td>Product Brand</td>
                                <td>Product Size</td>
                                <td>Product Color</td>
                                <td>Product Price</td>
                                <td>Date Ordered</td>
                                <td>Quantity</td>
                                <td>Action</td>
                            </tr>

                            <?php
                            require 'Connection.php';
                            $sqlI = "SELECT tbl_orders.OrderID, tbl_orders.CustomerID, tbl_products.ProductName, tbl_products.ProductBrand, tbl_orders.Size, " .
                                "tbl_orders.Color, tbl_products.ProductPrice, tbl_orders.DateOrdered, tbl_orders.Quantity " .
                                "FROM tbl_products RIGHT JOIN tbl_orders ON tbl_orders.ProductID = tbl_products.ProductID ORDER BY tbl_orders.OrderID";
                            $Resulta = mysqli_query($Conn, $sqlI);
                            while ($Rows = mysqli_fetch_array($Resulta)) :;
                            ?>
                                <tr style="color: black">
                                    <td><?php echo $Rows[0]; ?></td>
                                    <td><?php echo $Rows[1]; ?></td>
                                    <td><?php echo $Rows[2]; ?></td>
                                    <td><?php echo $Rows[3]; ?></td>
                                    <td><?php echo $Rows[4]; ?></td>
                                    <td><?php echo $Rows[5]; ?></td>
                                    <td><?php echo $Rows[6]; ?></td>
                                    <td><?php echo $Rows[7]; ?></td>
                                    <td><?php echo $Rows[8]; ?></td>
                                    <td>
                                        <a href="#" onclick="CancelOrderOnclick(<?php echo $Rows[0]; ?>);">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                    <button onclick="location.href='checkout.php'">Checkout</button>
                    <div>
                        <?php displayCart(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">

                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function CancelOrderOnclick(orderID) {
            if (confirm("Are you sure you want to delete this order?")) {
                window.location.href = "DeleteOrder.php?id=" + orderID;
            }
        }
    </script>

</body>

</html>
