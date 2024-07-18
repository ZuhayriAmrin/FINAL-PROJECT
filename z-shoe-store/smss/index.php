<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zack Online Shop</title>
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
        {
            $Username = $_SESSION["Username"];
        }
    ?>
</head>

<body>
<img src="ZACK.png" width="130" height="120" alt="ZACK SHOES SHOP" align="left">
<marquee><font size=7> WELCOME TO ZACK SHOE SHOP</font></marquee>
<br><br><br>   
    <title>ZACK SHOES SHOP</title>
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
                    <?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Register</a></li>';} ?>
                    <?php if($Username == null){echo '<li><a href="Login.php?Role=User">Login</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    
</video>
 
</p>
        <div class="row">
            <div class="box">
                <div class="col-lg-6 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/best1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/bshoe2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/bshoe11.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/bshoe10.jpg" alt="">
                            </div>
                            
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php 
            $conn = mysqli_connect("localhost","root","","shoe_store");
            $sql = "SELECT * FROM tbl_products Limit 10";
            $Resulta = mysqli_query($conn,$sql);
        ?>
        
        <iframe width="580" height="480" src="https://www.youtube.com/embed/tox5QCKWN0c" title="CR7 Footwear Campaign" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        
    </div>

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
                    </strong><br>
                   
                    </p>
                    
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        });
        
        $('#reg').click(function(){
            window.open('register.html', '_self');
        });
        
        function ManagementOnclick(){
            if(confirm("Only Administrators are allowed in this page, Please Login as an Administrator.") == true)
            {
                window.open("Login.php?Role=Admin", "_self", null, true);
            }
        }
        
        function addToCartOnclick(ProductID){
            if(confirm("Are you sure you want to add this product to your cart?") == true){
                window.open("order.php?ProductID=" + ProductID, "_self", null, true);
            }
        }
    </script>
</body>

</html>
