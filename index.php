<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce Store</title>
	<link rel="stylesheet" href="style.css">
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
					<!-- Welcome Guest -->
					<?php if(!isset($_SESSION['customer_email'])){
						echo "Welcome Guest";
					} else{
						echo "Welcome".$_SESSION['customer_name'];
					}
					?>
				</a>
				<a href="#">Shopping cart Total Price:INR <?php totalPrice(); ?>, Total Items:<?php item(); ?></a> <!-- Cart value and qty 
				display -->
			</div> <!-- 6 column offer End -->
			<div class="col-md-6">	
				<ul class="menu">
					<li>
						<a href="customer_registration.php">Register</a>
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
					</li>
					<li>
						<a href="cart.php">Goto Cart</a>
					</li>
					<li>
					<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>Login</a>";
						}else{
							echo "<a href='logout.php'>Logout</a>";
						}
					?>
					</li>
				</ul>
			</div>			
		</div>	<!-- container End -->
	</div> <!-- Top Bar End -->


	<!-- Navbar Starts -->

	<div class="navbar navbar-default navbar" > <!-- Navbar Navbar-default Start -->
		<div class="container">
			<div class="navbar-header"> <!-- Navbar Header Start -->
				<a class="navbar-brand home" href="index.php">
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
						<li class="active">
							<a href="index.php">HOME</a>
						</li>
						<li>
							<a href="shop.php">SHOP</a>
						</li>
						<li><?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='customer/my_account.php?my_order'>My Account</a>";
						}
						// <a href="checkout.php">Checkout</a> 
						?>
							<!-- <a href="customer/my_account.php">MY ACCOUNT</a> -->
						</li>
						<li>
							<a href="cart.php">SHOPPING CART</a>
						</li>
						<li>
							<a href="contactus.php">CONTACT US</a>
						</li>	
					</ul>
				</div> <!-- Padding Nav End -->
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php item(); ?> items in Cart</span>
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
	<div class="container" id="slider"> <!--Container Start--><br>
		<div class="col-md-12">	<!-- col-md-12 start-->	
			<div class="carousel slide" id="mycarousel">	<!--Carousel Slide Start -->
				<ol class="carousel-indicators">
					<li data-target="mycarousel" data-slide-to="0" class="action"></li>
					<li data-target="mycarousel" data-slide-to="1"></li>
					<li data-target="mycarousel" data-slide-to="2"></li>
					<li data-target="mycarousel" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner"> <!--carousel inner start -->
				<?php
					// $get_slider="SELECT * FROM slider LIMIT 0,1";
					// $run_slider=mysqli_query($conn,$get_slider);
					// while($row=mysqli_fetch_array($run_slider)){
					// 	$slider_name=$row['slider_name'];
					// 	$slider_image=$row['slider_image'];
					// 	$slider_url=$row['slider_url'];

					// 	echo "<div class'item active'>
					// 	<a href='$slider_url'><img src='images/carousel/$slider_image' alt='slider-image1'></a>
					// 	</div>";
					// }

				?>
					<div class='item active'>
						<a href='$slider_url'><img src='images/carousel/image4.jpg' alt='slider-image1'></a>
					 	</div>


				<?php
					// $get_slider="SELECT * FROM slider LIMIT 1,3";
					// $run_slider=mysqli_query($conn,$get_slider);
					// while($row=mysqli_fetch_array($run_slider)){
					// 	$slider_name=$row['slider_name'];
					// 	$slider_image=$row['slider_image'];
					// 	$slider_url=$row['slider_url'];

					// 	echo "<div class'item active'>
					// 	<a href='$slider_url'><img src='images/carousel/$slider_image' alt='slider-image1'></a>
					// 	</div>";
					// }

				?>
				
				</div> <!-- Carousel inner End-->
				<a href="#mycarousel" class="left carousel-control" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left">
						<span class="sr-only">
							Previous
						</span>
					</span>
				</a>
				<a href="#mycarousel" class="right carousel-control" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right">
						<span class="sr-only">Next</span>
					</span>
				</a>
			</div> <!--Carousel Slide End -->
		</div> <!-- col-md-12 end -->
	</div> <!-- container end -->
	<div id="advantage"> <!-- Advantage Start--> 
		<div class="container"> <!-- Advantage container Start-->
			<div class="same-height-row"><!-- Same height row Start-->
				<div class="col-sm-4"> <!-- col-sm-4 Start-->
					<div class="box same-height"> <!-- box same-height start -->
						<div class="icon"> <!-- icon start -->
							<i class="fa fa-heart">
							</i>
						</div> <!-- icon end -->
						<h3><a href="#">BEST PRICES</a></h3>
						<p>You can compare prices with others too than shop with us.</p>
					</div> <!-- box same-height End -->
				</div> <!-- col sm 4 End-->

				<div class="col-sm-4"> <!-- col-sm-4 Start-->
					<div class="box same-height"> <!-- box same-height start -->
						<div class="icon"> <!-- icon start -->
							<i class="fa fa-heart">
							</i>
						</div> <!-- icon end -->
						<h3><a href="#">100% SATISAFACTION GUARANTEED FROM US.</a></h3>
						<p>Free return.</p>
					</div> <!-- box same-height End -->
				</div> <!-- col sm 4 End-->

				<div class="col-sm-4"> <!-- col-sm-4 Start-->
					<div class="box same-height"> <!-- box same-height start -->
						<div class="icon"> <!-- icon start -->
							<i class="fa fa-heart">
							</i>
						</div> <!-- icon end -->
						<h3><a href="#">WE LOVE OUR CUSTOMER</a></h3>
						<p> Our team to provide best possible services ever.</p>
					</div> <!-- box same-height End -->
				</div> <!-- col sm 4 End-->

			</div> <!-- same height row End-->
		</div> <!-- Advantage Container End-->
	</div><!-- Advantage End-->

	<div id="hotbox"> <!-- hotbox start -->
		<div class="box"> <!-- box start -->
			<div class="container"> <!-- container start-->
				<div class="col-md-12"> <!--col-md-12 Start-->
					<h2>Latest this Week</h2>
				</div> <!-- col-md-12 end-->
			</div> <!-- container end-->
		</div> <!-- box end-->
	</div><!-- hotbox End -->

	<div id="content" class="container"> <!--Products content start-->
		<div class="row"> <!--Row Start-->
			<?php
				getpro();
			?>

		</div> <!--Row End-->
	</div> <!--Products content End-->

	<!-- footer start -->
	<?php
		include("includes/footer.php");
	?>
	<!-- footer end -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>