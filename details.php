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
						<a href="checkout.php">Checkout</a>
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
						<li>
							<a href="index.php">HOME</a>
						</li>
						<li class="active">
							<a href="shop.php">SHOP</a>
						</li>
						<li>
						<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='customer/my_account.php?my_order'>My Account</a>";
						}?>
						</li>
						<li>
							<a href="cart.php">SHOPPING CART</a>
						</li>
						<li>
							<a href="aboutus.php">ABOUT US</a>
						</li>
						<li>
							<a href="services.php">SERVICES</a>
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

	<div id="content"> <!--content Start-->
		<div class="container"> <!-- Container Start-->
			<div class="col-md-12"> <!-- Col-md-12 Start-->
				<ul class="breadcrumb">
					<li><a href="home.php">Home</a></li>
					<li>Shop</li>
				</ul>
			</div> <!-- Col-md-12 End-->

			<div class="col-md-3"> <!-- col-md-3 sidebar Start-->
				<?php
				include("includes/sidebar.php");
				?>
			</div> <!-- col-md-3 sidebar End-->
			<?php
			if(isset($_GET['pro_id'])){
			$pro_id=$_GET['pro_id'];
			}
			// $get_products="SELECT * FROM products WHERE ";
			// $run_getproducts=mysqli_query($conn,$get_products);
			// while($row_getproducts=mysqli_fetch_array($run_getproducts)){
			// 	$pro_title=$row_getproducts['product_title'];
			// 	$pro_price=$row_getproducts['product_price'];
			// 	$pro_m_img=$row_getproducts['product_main_img'];
			?>
			<div class="col-md-9"> <!--col-md-9 product details Start-->
				<div class="row" id="productmain"> <!-- row productmain Start-->
					<div class="col-sm-6"> <!--col-sm-6 Start-->
						<div id="mainimage"> <!--main image Start-->
							<div id="mycarousel" class="carousel slide" data-ride="carousel"> <!--mycarousel Start-->
								<ol class="carousel-indicators">
									<li data-target="#mycarousel" data-slide-to="0" class="acive"></li>
									<li data-target="#mycarousel" data-slide-to="1"></li>
									<li data-target="#mycarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner"> <!-- Carousel inner Start-->
									<div class="item active"> <!-- item active start-->
										<center>
											<img src="admin_area/product_images/product.jpg" alt="product" class="img-responsive">
										</center>
									</div><!-- item active End-->
									<div class="item"> <!-- item 2 start-->
										<center>
											<img src="admin_area/product_images/product2.jpg" alt="product2" class="img-responsive">
										</center>
									</div><!-- item 2 End-->
									<div class="item"> <!-- item 3 start-->
										<center>
											<img src="admin_Area/product_images/product3.jpg" alt="product3" class="img-responsive">
										</center>
									</div><!-- item 3 End-->
								</div> <!-- Carousel inner End-->

								<a href="#mycarousel" class="left carousel-control" data-slide="preview">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								
								<a href="#mycarousel" class="right carousel-control" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div> <!--mycarousel End-->
						</div> <!--main image End-->
					</div><!--col-sm-6 End-->
					<div class="col-sm-6"> <!--col-sm-6 2nd part Start-->
						<div class="box"> <!--box start-->							
							<h1 class="text-center"></h1>
							<?php
								addCart();
							?>
							<form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="form-horizontal">
								
								<div class="form-group"><!--form-group Start-->
									<label class="col-md-5 control-label"> Product Quantity</label>
									<div class="col-md-7"> <!-- col-md-7 Start-->
										<select name="product_qty" class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div><!-- col-md-7 End-->
								</div><!--form-group End-->

								<div class="form-group"><!--form-group Start-->
									<label class="col-md-5">Product Size</label>
									<div class="col-md-7"><!-- col-md-7 Start-->
										<select name="product_size" class="form-control">
											<option>Select a Size</option>
											<option>Small - S</option>
											<option>Medium - M</option>
											<option>Large - L</option>
											<option>Extra Large - XL</option>
										</select>
									</div><!-- col-md-7 End-->
								</div><!--form-group End-->
								<p class="price">INR 299</p>
								<p class="text-center buttons">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-shopping-cart">Add To Cart</i>
									</button>
								</p>
							</form>
						</div>	<!--box End-->

						<div class="col-xs-4"> <!-- col-xs-4  Small images Start -->
							<a href="#" class="thumb">
								<img src="admin_area/product_images/product.jpg" alt="" class="img-responsive" alt="product">
							</a>
						</div><!-- col-xs-4  Small images End --> 
						<div class="col-xs-4"> <!-- col-xs-4  Small images 2 Start -->
							<a href="#" class="thumb">
								<img src="admin_area/product_images/product.jpg" alt="" class="img-responsive" alt="product1">
							</a>
						</div><!-- col-xs-4  Small images 2 End -->
						<div class="col-xs-4"> <!-- col-xs-4  Small images 3 Start -->
							<a href="#" class="thumb">
								<img src="admin_area/product_images/product.jpg" alt="" class="img-responsive" alt="product2">
							</a>
						</div><!-- col-xs-4  Small images 3 End -->
						
					</div><!--col-sm-6 2nd part End-->

				</div> <!--row productmain End-->
				
				<br>
				
				<div class="box" id="details"> <!-- Box details start -->
					<h4>Product Details</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<h4>Size</h4>
					<ul>
						<li>Smaill</li>
						<li>Medium</li>
						<li>Large</li>
						<li>Extra Large</li>

					</ul>
				</div><!-- Box details End -->

				<!-- Related items -->
				
				<div class="row same-height-row"> <!-- row same-height-row start -->
							<div class="col-md-3 col-sm-3"> <!-- col-md-3 col-sm-6 Start -->
								<div class="box headline same-height"><!-- box headline same-height Start -->
									<div class="text-center">You May Also Like These Products</div>
								</div><!-- box headline same-height End -->
							</div><!-- col-md-3 col-sm-6 End -->

								<?php
									$get_product="SELECT * FROM products ORDER BY 1 LIMIT 0,3";
									$run_products=mysqli_query($conn,$get_product);
									while($row=mysqli_fetch_array($run_products)){
										$pro_id=$row['product_id'];
										$pro_title=$row['product_title'];
										$pro_price=$row['product_price'];
										$pro_main_img=$row['product_main_img'];
										echo"<div class='center-responsive col-md-3'><!-- center responsive col-md-3 Start -->
												<div class='product same-height'>
													<a href='details.php?pro_id=$pro_id'>
														<img src='admin_area/product_images/$pro_main_img' alt='product' class='img-responsive'>
													</a>
													<div class='text'>
														<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
														<p class='price'>INR $pro_price</p>
													</div>
												</div>
											</div> <!-- center responsive col-md-3 End -->";
									}
								?>

							<div class="center-responsive col-md-3"><!-- center responsive col-md-3 Start -->
								<div class="product same-height">
									<a href="">
										<img src="admin_area/product_images/product.jpg" alt="product" class="img-responsive">
									</a>
									<div class="text">
										<h3><a href="details.php">Benetton Tshirt</a></h3>
									    <p class="price">INR 199</p>
									</div>
								</div>
							</div> <!-- center responsive col-md-3 End -->

							<div class="center-responsive col-md-3"><!-- center responsive col-md-3 Start -->
								<div class="product same-height">
									<a href="">
										<img src="admin_area/product_images/product.jpg" alt="product" class="img-responsive">
									</a>
									<div class="text">
										<h3><a href="details.php">Benetton Tshirt</a></h3>
									    <p class="price">INR 199</p>
									</div>
								</div>
							</div> <!-- center responsive col-md-3 End -->

						</div> <!-- row same-height-row End -->

			</div> <!--col-md-9 product details End-->














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