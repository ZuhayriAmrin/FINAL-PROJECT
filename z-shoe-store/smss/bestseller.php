<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Best Sellers</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{$Username = $_SESSION["Username"];}
?>
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
                <a class="navbar-brand" href="index.html">Online Shoes Store</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
					<li><a href="bestseller.php">Best Sellers</a></li>
					<li><a href="shop.php">Shop</a></li>
                    <li><a href="about.php">About</a></li>
					<li><a href="#" onclick="ManagementOnclick();">Management</a></li>
					<li><a href="cart.php">Cart</a></li>
					<?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Register</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="Login.php?Role=User">Login</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

			<div class="row">
				<div class="box" style="border-radius: 10px;">
					<div class="col-lg-4">
						<hr>
						<h2 class="intro-text text-center">Top 2 <strong>BEST</strong>sellers</h2>
						<hr>
					</div><br></br>
				</div>
			</div>

			<?php
				$num = 2;
				require 'Connection.php';
				$sql = "SELECT * FROM `tbl_products` Limit 2";
				$Resulta = mysqli_query($Conn,$sql);
				while($Rows = mysqli_fetch_array($Resulta)){
					echo '	
						<div class="row">
							<div class="box" style="border-radius: 10px;">
								<div class="col-lg-4">
									<hr>
									<h2 class="intro-text text-center">Top '. $num.'</h2>
									<hr>
									<img class="img-responsive img-border img-left" src="data:image;base64,'.$Rows[7].'" alt="">
									<hr class="visible-xs">
									<p><strong>Product Name:</strong> '.$Rows[1].'</p>
									<p><strong>Product Brand:</strong> '.$Rows[2].'</p>
									<p><strong>Size Available:</strong> '.$Rows[3].'</p>
									<p><strong>Colors Available:</strong> '.$Rows[4].'</p>
									<p><strong>Product Description:</strong> '.$Rows[8].'</p>
									<p><strong>RM '.$Rows[5].'.00</strong></p>
									<a onclick="addToCartOnclick('.$Rows[0].');" href="#"  style="margin-bottom: 5px;" class="btn btn-primary">Add to Cart</a>
								</div>
							</div>
						</div>';
					$num--;
				}
			?>
	</div>


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
		function addToCartOnclick(ProductID)
		{	
			if(confirm("Are you sure you want to add this product to your cart?") == true){
			window.open("Order.php?ProductID="+ProductID,"_self",null,true);
			}
		}
	</script>

</body>

</html>
