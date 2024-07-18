<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
	?>
</head>

<body>
<img src="ZACK.png" width="130" height="120" alt="ZACK SHOES SHOP" align="left">
<marquee><font size=7> WELCOME TO ZACK SHOE SHOP</font></marquee>
    <div class="address-bar"><strong>Affordable</strong> Shoes for Everyone</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Zack Shoe Shop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr align="left" >
                    <h2 class="intro-text text-left">About Our Shop</h2>
                    </h2>
                    <hr align="left">
                </div>
                <div class="col-md-4">
                    <img class="img-responsive img-border-left" src="img/About Us.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <p>Welcome to ZShoe Shop!At Z Shoe Shop, we believe that the right pair of shoes can make all the difference. Whether you're searching for style, comfort, or performance, our mission is to provide you with footwear that fits your life perfectly.</p>
                    <br>
                    <p>Founded in 2023 by Zuhayri Amrin, our journey began with a passion for quality shoes and a dream to make high-quality footwear accessible to everyone. What started as a small boutique has now grown into a beloved brand known for its unique designs and exceptional customer service.</p>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <p>
					<?php echo '<strong>'.$Username.'</strong>'; ?>
					<br>
					<strong>
					<?php if($Username != null){echo '<a href="ManageAccount.php?Role=User">Manage Account</a> |';} ?> 
					<?php if($Username == null){echo '<a href="Login.php?Role=User">Login</a>';} else {echo '<a href="Logout.php">Logout</a>';} ?> | 
					<a href="#">Back to top</a>
					</strong>
					</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script>
		
		function ManagementOnclick(){
			if(confirm("Only Administrators are allowed in this page, Please Login as an Administrator.") == true)
			{
				window.open("Login.php?Role=Admin","_self",null,true);
			}
		}
		
    </script>

</body>

</html>
