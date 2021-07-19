<?php
include("includes/db.php");
?>
<div id="footer"><!-- footer Start-->
    <div class="container"> <!-- Container Start-->
        <div class="row"> <!-- row Start-->
            <div class="col-md-3 col-sm-6"> <!-- col-md-3 col-sm-6 Start-->
                <h4>Pages</h4>
                <ul>
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="../checkout.php">Login</a></li>
                    <li><a href="../customer_registration.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            
            </div><!--col-md-3 col-sm-6 End-->
            <div class="col-md-3 col-sm-6"> <!-- col-md-3 col-sm-6 Start-->
                <h4>Top Product Categories</h4>
                <ul>
                    <!-- <li><a href="#">Jacket</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Shoes</a></li>
                    <li><a href="#">Coats</a></li>
                    <li><a href="#">Tshirts</a></li> -->
                    <?php
                    $get_p_cats="SELECT * FROM product_categories";
                    $run_p_cats=mysqli_query($conn,$get_p_cats);
                    while($row_p_cat=mysqli_fetch_array($run_p_cats)){
                        $p_cat_id=$row_p_cat['p_cat_id'];
                        $p_cat_title=$row_p_cat['p_cat_title'];
                        echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
                    }
                    ?>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div> <!-- col-md-3 col-sm-6 End-->

            <div class="col-md-3 col-sm-6"> <!-- col-md-3 col-sm-6 Start-->
                <h4>Where to Find us?</h4>
                <p>
                    <strong>Shoppingsite.com</strong>
                    <br>Sohawal
                    <br>Ayodha
                    <br>Uttar Pradesh
                    <br>support@shoppingsite.com
                </p>
                <a href="contact.php">Go to Contact us Page.</a>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div> <!-- cold-md-3 col-sm-6 End-->

            <div class="col-md-3 col-sm-6"> <!-- cold-md-3 col-sm-6 Start-->
                <h4>Get the News</h4>
                <p class="text-muted">
                    Subscribe here for getting the latest News
                </p>
                <form action="" method="post">
                    <div class="input-green">
                        <input type="text" name="email" class="form-control">
                        <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="subscribe">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay In Touch</h4>
                <p class="social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-envelope"></i></a>
                <a href="#"><i class="fa fa-quora"></i></a>
                </p>
            </div> <!-- col-md-3 col-sm-6 End-->

        </div> <!-- row End-->
    </div><!--Container End-->
</div> <!--footer End-->

<div class="copyright"><!-- Copyright Start-->
                <div class="container"> <!-- Container Start-->
                    <div class="col-md-6"> <!-- Col-md-6-->
                        <p class="pull-left">
                            &copy; 2021 By <span style="color:#ffff00">Yash<span>
                        </p>
                    </div> <!-- Col-md-6-->
                    <div class="col-md-6">
                        <p class="pull-right">
                            Tempelate By: <a href="index.php">www.shoppingsite.com</a>
                        </p>
                    </div>
                </div><!-- Container End-->
            </div><!-- Copyright ENd-->