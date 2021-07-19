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
					<!-- Welcome Guest
					<?php if(!isset($_SESSION['customer_email'])){
						echo "Welcome Guest";
					} else{
						echo "Welcome".$_SESSION['customer_name'];
					}
					?> -->
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
							echo "<a href='login.php'>Login</a>";
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
						<li>
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
						<li class="active">
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

    <div id="content"> <!--content Start-->
        <div class="container"> <!-- Container Start--><br>
            <div class="col-md-12"> <!-- Col-md-12 Start-->
                <ul class="breadcrumb">
                    <li><a href="home.php">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div> <!-- Col-md-12 End-->

            <div class="col-md-9" id="cart"> <!-- col-md-9 cart Start -->
            	<div class="box"> <!-- box Start -->
            		<form action="cart.php" method="post" enctype="multipart-form-data">
            			<h1>Shopping cart</h1>
						<?php
						$ip_add=getUserIP();
						$get_items="SELECT * FROM cart WHERE ip_add='$ip_add'";
						$run_item=mysqli_query($conn,$get_items);
						$count=mysqli_num_rows($run_item);
						?>
            			<p class="text-muted">Currently You have <?php echo $count; ?> Item(s) in Your Cart</p>
            			<div class="table-responsive"> <!-- table-responsive start -->
            				<table class="table">
            					<thead>
            						<tr>
            							<th colspan="2">Product</th>
            							<th>Quantity</th>
            							<th>Unit Price</th>
            							<th>Size</th>
            							<th colspan="1">Delete</th>
            							<th colspan="1">Sub Total</th>
            						</tr>
            					</thead>
            					<tbody>
									<?php
										$subtotal=0; $total=0;
										while($row=mysqli_fetch_array($run_item)){
											$pro_id=$row['p_id'];
											$pro_size=$row['size'];
											$pro_qty=$row['qty'];
											$get_product="SELECT * FROM products WHERE product_id=$pro_id";
											$run_product=mysqli_query($conn,$get_product);
											while($row=mysqli_fetch_array($run_product)){
												$p_title=$row['product_title'];
												$p_m_img=$row['product_main_img'];
												$p_price=$row['product_price'];
												$subtotal=$row['product_price']*$pro_qty;
												$total+=$subtotal;
												echo"<tr>
													<td><img src='admin_area/product_images/$p_m_img' alt='product'></td>
													<td>$p_title</td>
													<td>$pro_qty</td>
													<td>INR $p_price</td>
													<td>$pro_size</td>
													<td><input type='checkbox' name='remove[]' value='$pro_id' id=''></td>
													<td>INR $subtotal </td>
												</tr>";
											}
											
										}
									?>

            						
            					</tbody>
            					<tfoot>
            						<tr>
            							<th colspan="5">Total</th>
            							<th colspan="2">INR <?php echo $total; ?></th>
            						</tr>
            					</tfoot>
            				</table>
            			</div> <!-- table-responsive End -->
            			<div class="box-footer"> <!-- box-footer start -->
            				<div class="pull-left"> <!-- pull-left Start -->
            					<a href="index.php" class="btn btn-default">
            						<i class="fa fa-chevron-left"></i> Continue Shopping
            					</a>
            				</div> <!-- pull-left End -->
            				<div class="pull-right"> <!-- pull-right start -->
            					<button class="btn btn-default" type="submit" name="Update" value="Update Cart">
            						<i class="fa fa-refresh"> Update Cart</i>
            					</button>
            					<a href="checkout.php" class="btn btn-primary">Proceed To Checkout <i class="fa fa-chevron-right"></i></a>
            				</div><!-- pull-right End -->
            			</div><!-- box-footer End -->
            		</form>
            	</div> <!-- box End -->
				<?php
					function updatecart(){
						global $conn;
						if(isset($_POST['update'])){
							foreach($_POST['remove'] as $remove_id){
								$delete_product="DELETE FROM cart WHERE p_id='$remove_id'";
								$run_del=mysqli_query($conn,$delete_product);
								if($run_del){
									echo "<script>window.open('cart.php','_self')<script>";
								}
							}
						}
					}
					echo @$up_cart=updatecart();

				?>

            	<!-- Related Items -->

            	<div class="row same-height-row"> <!-- row same-height-row start -->
							<div class="col-md-3 col-sm-3"> <!-- col-md-3 col-sm-6 Start -->
								<div class="box headline same-height"><!-- box headline same-height Start -->
									<div class="text-center">You May Also Like These Products</div>
								</div><!-- box headline same-height End -->
							</div><!-- col-md-3 col-sm-6 End -->

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

            </div> <!-- col-md-9 cart End -->

            <div class="col-md-3"><!-- col-md-3 Start -->
            	<div class="box" id="order-summary"> <!-- box order-summary Start -->
            		<div class="box-header"> <!-- box-header start -->
            			<h3>Order Summary</h3>
            		</div> <!-- box-header End -->
            		<br><br>
            		<p class="text-muted">
            			Shipping and Additional Cost are Calculated Based on The values you have Entered.
            		</p>
            		<div class="table-responsive"> <!-- table-responsive Start -->
            			<table class="table">
            				<tbody>
            					<tr>
            						<td>Order Subtotal</td>
            						<th>INR <?php echo $subtotal;?></th>
            					</tr>
            					<tr>
            						<td>Shipping and Handling</td>
            						<td>INR 0</td>
            					</tr>
            					<tr>
            						<td>Tax</td>
            						<td>INR 0</td>
            					</tr>
            					<tr class="Total">
            						<td>Total</td>
            						<th>INR <?php echo $total; ?></th>
            					</tr>
            				</tbody>
            			</table>
            		</div><!-- table-responsive End -->
            	</div> <!-- box order-summary End -->
            </div> <!-- col-md-3 End -->


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