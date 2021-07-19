<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header"> <!-- navbar-header Start-->
        <button type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse" class="navbar-toggle">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    </div> <!-- navbar-header End-->

    <ul class="nav navbar-right top-nav"> <!-- nav navbar-right top-nav Start-->
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <i class="fa fa-user"></i> <?php echo $admin_name; ?>
            </a>
            <ul class="dropdown-menu"> <!-- dropdown-menu Start-->
                <li>
                    <a href="index.php?user_profile?id=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw-user"></i>  Profile
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_pro">
                        <i class="fa fa-fw-envelope"></i>  Products
                        <span class="badge"><?php echo $count_pro; ?></span>
                    </a>
                </li>
                
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw-user"></i>  Customer
                        <span class="badge"><?php echo $count_cust; ?></span>

                    </a>
                </li>
                
                <li>
                    <a href="index.php?pro_cat">
                        <i class="fa fa-fw-gear"></i>  Product Categories
                        <span class="badge"><?php echo $count_p_cat; ?></span>

                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Logout <i class="fa fa-fw fa-power-off"></i> </a>
                </li>

            </ul> <!-- dropdown-menu End-->
        </li>
    </ul> <!-- nav navbar-right top-nav End-->

    <div class="collapse navbar-collapse navbar-ex1-collapse"> <!--collapse navbar-collapse navbar-ex1-collapse Start-->
        <ul class="nav navbar-nav side-nav"> <!-- nav navbar-nav side-nav Start--> 
            <li> <!-- Dashboard Start Here-->
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li> <!-- Dashboard End Here-->

            <li> <!-- Product Start Here-->
                <a href="#" data-toggle="collapse" data-target="#products">
                <i class="fa fa-fw fa-table"></i> Product <i class="fa fa-fw fa-caret-down"></i>
                </a>
            
                <ul id="products" class="collapse"> <!-- Product Dropdown Start-->
                    <li>
                        <a href="index.php?insert_product">Insert Product</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">View Product</a>
                    </li>
                </ul><!-- Product Dropdown End-->
            </li> <!-- Product End Here-->

            <li> <!-- Product Categories Start Here-->
                <a href="#" data-toggle="collapse" data-target="#product_cat">
                <i class="fa fa-fw fa-table"></i> Product Categories <i class="fa fa-fw fa-caret-down"></i>
                </a>
            
                <ul id="product_cat" class="collapse"> <!-- Product Dropdown Start-->
                    <li>
                        <a href="index.php?insert_product_cat">Insert Product Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_product_cat">View Product Categories</a>
                    </li>
                </ul><!-- Product Categories Dropdown End-->
            </li> <!-- Product Categories End Here-->

            <li> <!-- Categories Start Here-->
                <a href="#" data-toggle="collapse" data-target="#categories">
                <i class="fa fa-fw fa-table"></i> Categories <i class="fa fa-fw fa-caret-down"></i>
                </a>
            
                <ul id="categories" class="collapse"> <!-- Product Dropdown Start-->
                    <li>
                        <a href="index.php?insert_categories">Insert Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_categories">View Categories</a>
                    </li>
                </ul><!-- Categories Dropdown End-->
            </li> <!-- Categories End Here-->

            <li> <!-- Slider Start Here-->
                <a href="#" data-toggle="collapse" data-target="#slider">
                <i class="fa fa-fw fa-table"></i> Slider <i class="fa fa-fw fa-caret-down"></i>
                </a>
            
                <ul id="slider" class="collapse"> <!-- Slider Dropdown Start-->
                    <li>
                        <a href="index.php?insert_slider">Insert Slider</a>
                    </li>
                    <li>
                        <a href="index.php?view_slider">View Slider</a>
                    </li>
                </ul><!-- Slider Dropdown End-->
            </li> <!-- Slider End Here-->

            <li><!-- View Customer Start Here-->
                <a href="index.php?view_customer">
                    <i class="fa fa-fw fa-edit"></i> View Customer
                </a>
            </li><!-- View Customer End Here-->

            <li><!-- View Order Start Here-->
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-list"></i> View Order
                </a>
            </li><!-- View Order End Here-->
            
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-pencil"></i> View ayments
                </a>
            </li>

            <li> <!-- User Start Here-->
                <a href="#" data-toggle="collapse" data-target="#user">
                <i class="fa fa-fw fa-table"></i> Users <i class="fa fa-fw fa-caret-down"></i>
                </a>
            
                <ul id="user" class="collapse"> <!-- User Dropdown Start-->
                    <li>
                        <a href="index.php?insert_user">Insert Users</a>
                    </li>
                    <li>
                        <a href="index.php?view_user">View Users</a>
                    </li>
                    <li>
                        <a href="index.php?user_profile?id=<?php echo $admin_id ?>">Edit Profile</a>
                    </li>
                </ul><!-- User Dropdown End-->
            </li> <!-- User End Here-->

        </ul> <!-- nav navbar-nav side-nav End-->
    </div> <!--collapse navbar-collapse navbar-ex1-collapse End-->
</nav>