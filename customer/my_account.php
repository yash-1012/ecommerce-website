<?php
session_start();
if(!isset($_SESSION['customer_email'])){
	echo "<script>window.open('../checkout.php','_self')</script>";
}
include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce Store</title>
	<link rel="stylesheet" href="../style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<!-- Top Bar Starts -->
	<div id='top'> <!-- top bar start -->
		<div class='container'> <!-- container start -->
			<div class='col-md-6 offer'> <!-- Top Bar 6 column offer start -->
				<a href="#" class="btn btn-success btn-sm nohover" id="guest-btn">	<!-- Welcome Guest Button -->
					Welcome Guest
				</a>
				<a href="#">Shopping cart Total Price:INR 100, Total Items:2</a> <!-- Cart value and qty 
				display -->
			</div> <!-- 6 column offer End -->
			<div class="col-md-6">	
				<ul class="menu">
					<li>
						<a href="../customer_registration.php">Register</a>
					</li>
					<li>
					<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='customer/my_account.php?my_order'>My Account</a>";
						}
						// <a href="checkout.php">Checkout</a> 
					?>
						<!-- <a href="../checkout.php">Checkout</a> -->
					</li>
					<li>
						<a href="../cart.php">Goto Cart</a>
					</li>
					<li>
						<a href="../login.php">Login</a>
					</li>
				</ul>
			</div>			
		</div>	<!-- container End -->
	</div> <!-- Top Bar End -->


	<!-- Navbar Starts -->

	<div class="navbar navbar-default navbar" > <!-- Navbar Navbar-default Start -->
		<div class="container">
			<div class="navbar-header"> <!-- Navbar Header Start -->
				<a class="navbar-brand home" href="../index.php">
					<img src="images/logo.jpg" alt="SS" class="hidden-xs" > <!-- width=30% height=180% margin-top=0 -->
					<img src="images/logo.jpg" alt="SS-small" class="visible-xs" ><!-- width="500" height="600" -->
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>
			</div> <!-- Navbar Header Ends -->
			<div class="navbar-collapse collapse" id="navigation"> <!-- Navbar-Collapse Collapse Start -->
				<div class="padding-nav"> <!-- Padding Nav Start -->
					<ul class="nav navbar-nav navbar-left">
						<li>
							<a href="../index.php">HOME</a>
						</li>
						<li>
							<a href="../shop.php">SHOP</a>
						</li>
						<li class="active">
						<?php
							if(!isset($_SESSION['customer_email'])){
								echo "<a href='checkout.php'>My Account</a>";
							}else{
								echo "<a href='customer/my_account.php?my_order'>My Account</a>";
							}
						// <a href="checkout.php">Checkout</a> 
						?>
							<!-- <a href="my_account.php">MY ACCOUNT</a> -->
						</li>
						<li>
							<a href="../cart.php">SHOPPING CART</a>
						</li>
						
						<li>
							<a href="../contactus.php">CONTACT US</a>
						</li>	
					</ul>
				</div> <!-- Padding Nav End -->
				<a href="../cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span>4 items in Cart</span>
				</a>
				<div class="navbar-collapse collapse right"> <!-- navbar collapse collapse right Start -->
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
				</div> <!-- navbar collapse collapse right End -->
				<div class="collapse clearfix" id="search">
					<form class="navbar-form" method="get" action="result.php">
						<div class="input-group">
							<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
							<span class="input-group-btn">
								<button type="submit" value="Search" name="search" class="btn btn-primary">
								<i class="fa fa-search"></i>
							</span>
							</button>
						</div>
					</form>
				</div>
			</div> <!-- Navbar-Collapse Collapse End -->
		</div>
	</div> <!-- Navbar Navbar-default End -->

    <div id="content"> <!--content Start-->
        <div class="container"> <!-- Container Start--><br>
            <div class="col-md-12"> <!-- Col-md-12 Start-->
                <ul class="breadcrumb">
                    <li><a href="../home.php">Home</a></li>
                    <li>My Account</li>
                </ul>
            </div> <!-- Col-md-12 End-->

            <div class="col-md-3"> <!-- col-md-3 sidebar Start-->
                <?php
                    include("includes/sidebar.php");
                ?>
            </div> <!-- col-md-3 sidebar End-->

            <div class="col-md-9"> <!--col-md-9 Start-->
                <?php
                    // including my_order php page
                    if(isset($_GET['my_order'])){
                        include("my_order.php");
                    }
                    // including pay offline page
                    if(isset($_GET['pay_offline']))
                    include("pay_offline.php");

                    // including edit account
                    if(isset($_GET['edit_act']))
                    include("edit_act.php");

                    //including change password
                    if(isset($_GET['change_pass']))
                    include("change_password.php");

                    //including delete account
                    if(isset($_GET['delete_ac']))
                    include("delete_ac.php");

                ?>
            </div> <!--col-md-9 End-->




            </div><!-- Container End-->
    </div> <!--content End-->

    <!-- footer start -->
	<?php
		include("includes/footer.php");
	?>
	<!-- footer end -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>