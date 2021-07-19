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
		<br>
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

            <div class="col-md-9"> <!-- col-md-9 Start-->
                <?php
                // <div class="box"> <!--Box Start-->
                //     <h1>Shop</h1>
                //     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis iusto in deleniti rerum vero sequi voluptas numquam laudantium vitae recusandae veniam ut molestias temporibus explicabo, dolorem blanditiis quasi fuga ad.</p>
                // </div> <!--Box End-->
                    if(!isset($_GET['p_cat'])){
                        if(!isset($_GET['cat'])){
                        echo"<div class='box'> <!--Box Start-->
                            <h1>Shop</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis iusto in deleniti rerum vero sequi voluptas numquam laudantium vitae recusandae veniam ut molestias temporibus explicabo, dolorem blanditiis quasi fuga ad.</p>
                        </div> <!--Box End-->";
                        }
                    }

                    elseif(isset($_GET['p_cat'])) {
						getPCatPro();
					}

					elseif (isset($_GET['cat'])){
						getCatPro();
					}
                ?>
                <div class="row"> <!-- row Start-->
                    <?php
                        if(!isset($_GET['p_cat'])){
                            if(!isset($_GET['cat'])){
                                $per_page=6;
                                if(isset($_GET['page'])){
                                    $page=$_GET['page'];
                                }else{
                                    $page=1;
                                }
                                $start_form=($page-1)*$per_page;
                                $get_products="SELECT * FROM products order by 1 DESC LIMIT $start_form,$per_page";
                                $run_getproducts=mysqli_query($conn,$get_products);
                                while($row_getproducts=mysqli_fetch_array($run_getproducts)){
                                    $pro_id=$row_getproducts['product_id'];
                                    $pro_title=$row_getproducts['product_title'];
                                    $pro_price=$row_getproducts['product_price'];
                                    $pro_m_img=$row_getproducts['product_main_img'];

                                    echo "<div class='col-md-4 col-sm-6 center-responsive'> <!-- col-md-4 col-sm-6 Start-->
                                    <div class='product'> <!-- product Start-->
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img src='admin_area/product_images/$pro_m_img' alt='product' class='img-responsive'>
                                        </a>
                                        <div class='text'> <!-- Text Start-->
                                            <h3>
                                                <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                                            </h3>
                                            <p class='price'>INR $pro_price</p>
                                            <p class='buttons'>
                                                <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details</a>
                                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                            </p>
                                        </div> <!-- Text End-->
                                    </div><!-- product End-->
                                </div> <!-- col-md-4 col-sm-6 End-->";
                                }
                    ?>
                </div> <!-- row End-->
                    
                    <center>
                        <ul class="pagination">

                        <?php
                            $totalpro_query="SELECT * FROM products";
                            $result=mysqli_query($conn,$totalpro_query);
                            $total_record=mysqli_num_rows($result);
                            if($total_record>6){
                                $total_pages=ceil($totalpro_query/$per_page);
                            
                                echo"<li><a href='shop.php?page=1'>First Page</a></li>";
                        
                                for($i=$_GET['page']+1;$i<=$_GET['page']+3;$i++){
                                    echo "<li><a href='shop.php?page=$i'>$i</a></li>";
                                    echo "<li><a href='shop.php?page=$total_pages'>Last Page</a></li>";
                            }
                            
                            }
                        }
                    }  
                        ?>
                            
                            
                        </ul>
                    </center>
            </div><!-- col-md-9 End-->
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