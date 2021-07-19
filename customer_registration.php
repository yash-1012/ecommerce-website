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
				<a href="#">Shopping cart Total Price:INR <?php totalPrice(); ?>, Total Items: <?php item(); ?></a> <!-- Cart value and qty 
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
						<li class="active">
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
                    <li>Registration</li>
                </ul>
            </div> <!-- Col-md-12 End-->

            <!-- <div class="col-md-3">  col-md-3 sidebar Start
            	 <?php
                //    include("includes/sidebar.php");
                ?> 
            </div> col-md-3 sidebar End -->

            <div class="col-md-11"> <!--col-md-9 Start-->
                <div class="box"> <!--box Start-->
                    <div class="box-header"> <!--box-header Start-->
                        <center>
                            <h2>New Registration</h2>
                        </center>
                    </div><!--box-header End-->
                    <br><br>
                    <form action="customer_registration.php" method="post" type="multipart/form-data">
                        <div class="form-group"> <!-- form-group start-->
                            <label>Name</label>
                            <input type="text" name="c_name" required="" class="form-control">
                        </div><!--form-group End-->

                        <div class="form-group"> <!--form-group Start-->
                            <label>Email</label>
                            <input type="text" name="c_email" class="form-control" required="">
                        </div><!--form-group End-->

                        <div class="form-group"><!--form-group Start-->
                            <label>Password</label>
                            <input type="password" name="c_password" required="" class="form-control">
                        </div><!--form-group End-->

                        <div class="form-group"><!--form-group Start-->
                            <label>Address</label>
                            <input type="text" name="c_address" required="" class="form-control">
                        </div><!--form-group End-->

                        <div class="form-group"><!--form-group Start-->
                            <label>City</label>
                            <input type="text" name="c_city" class="form-control">
                        </div><!--form-group End-->

						<div class="form-group"><!--form-group Start-->
                            <label>Contact (+91)</label>
                            <input type="text" name="c_contact" class="form-control">
                        </div><!--form-group End-->

                        <div class="form-group"><!--form-group Start-->
                            <label>Country</label>
                            <input type="text" name="c_country" required="" class="form-control">
                        </div><!--form-group End-->

                        <div class="form-group"><!--form-group Start-->
                            <label>Image</label>
                            <input type="file" name="c_image" class="form-control">
                        </div><!--form-group End-->

                        <div class="text-center"> <!--text-center End-->
                            <button type="submit" class="btn btn-primary" name="submit">
                                <i class="fa fa-user-md"></i>Register
                            </button>
                        </div> <!--text-center End-->
                    </form>

                    

                </div><!--box End-->
            </div><!--col-md-9 End-->

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
<?php
	if(isset($_POST['submit'])){
		$c_name=$_POST['c_name'];
		$c_email=$_POST['c_email'];
		$c_password=$_POST['c_password'];
		$c_country=$_POST['c_country'];
		$c_city=$_POST['c_city'];
		$c_contact=$_POST['c_contact'];
		$c_address=$_POST['c_address'];
		$c_ip=getUserIP();
		if(isset($_FILES['c_image']['name'])){
			$c_image_name=$_FILES['c_image']['name'];
			$c_image_tmp_name=$_FILES['c_image']['tmp_name'];
			move_uploaded_file($c_image_tmp_name,"customer/customer_images/$c_image_name");$insert_customer="INSERT INTO customers (`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_add`, `customer_image`, `customer_ip`) VALUES ('{$c_name}','{$c_email}','{$c_password}','{$c_country}','{$c_city}','{$c_contact}','{$c_address}','{$c_image_name}','{$c_ip}')";
		}else{
			$insert_customer="INSERT INTO customers (`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_add`, `customer_ip`) VALUES ('{$c_name}','{$c_email}','{$c_password}','{$c_country}','{$c_city}','{$c_contact}','{$c_address}','{$c_ip}')";
		}


		$run_customer=mysqli_query($conn,$insert_customer);
		if(!$run_customer){
			echo mysqli_error($conn);
		}

		$sel_cart="SELECT * FROM cart WHERE ip_add='$c_ip'";
		$run_cart=mysqli_query($conn,$sel_cart);
		$check_cart=mysqli_num_rows($run_cart);
		if($check_cart){
			echo mysqli_error($conn);
		}
		if($check_cart>0){
			$_SESSION['customer_email']=$c_email;
			$_SESSION['customer_name']=$c_name;
			echo "<script>alert('You have benn registered Successfully.')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		}else{
			$_SESSION['customer_email']=$c_email;
			$_SESSION['customer_name']=$c_name;
			echo "<script>alert('You have benn registered Successfully.')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}

?>