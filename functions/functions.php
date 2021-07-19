<?php
    $db=mysqli_connect("localhost","root","","ecom");

    //get ip address Start
    function getUserIP(){
        switch (true){
            case(!empty($_SERVER['HTTP_X_REAL_PATH'])): return $_SERVER['HTTP_X_REAL_PATH'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_X_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default:return $_SERVER['REMOTE_ADDR'];
        }
    }
    //get ip address End

    //Add to Cart Start
    function addCart(){
        global $db;
        if(isset($_GET['add_cart'])){
            $ip_add=getUserIP();
            $p_id=$_GET['add_cart'];
            $product_qty=$_POST['product_qty'];
            $product_size=$_POST['product_size'];
            $check_product="SELECT * FROM cart where ip_add='$ip_add' AND p_id='$p_id'";
            $run_check=mysqli_query($db,$check_product) or die(mysqli_query($db));
            if(mysqli_num_rows($run_check)>0){
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                exit();
            }else{
                $insert_query="INSERT INTO cart(p_id,ip_add,qty,size) VALUES ('$p_id','$ip_add','$product_qty','$product_size')";
                $run_query=mysqli_query($db,$insert_query)or die(mysqli_query($db));
                echo "<script>windows.open('detail.php?pro_id=$p_id','_self')</script>";
            }
        }
    }
    //Add to Cart End

    //cart item count Start
    function item(){
        global $db;
        $ip_add=getUserIP();
        $get_items="SELECT * FROM cart WHERE ip_add='$ip_add'";
        $run_item=mysqli_query($db,$get_items);
        $count=mysqli_num_rows($run_item);
        echo $count;
    }
    //cart item count End

    //Cart Total Price Start

    function totalPrice(){
        global $db;
        $ip_add=getUserIP();
        $total=0;
        $select_cart="SELECT * FROM cart WHERE ip_add='$ip_add'";
        $run_cart=mysqli_query($db,$select_cart);
        while($record=mysqli_fetch_array($run_cart)){
            $pro_id=$record['p_id'];
            $pro_qty=$record['qty'];
            $get_price="SELECT * FROM products WHERE product_id='$pro_id'";
            $run_price=mysqli_query($db,$get_price);
            while($row_price=mysqli_fetch_array($run_price)){
                $sub_total=$row_price['product_price']*$pro_qty;
                $total +=$sub_total;
            }
        }
        echo $total;
    }

    //Cart Total Price End

    // fetching products in index page Start
    function getpro(){
        global $db;
        $get_product="SELECT * FROM products order by 1 DESC LIMIT 0,6";
        $run_product=mysqli_query($db,$get_product);
        while($row_product=mysqli_fetch_array($run_product)){
            $pro_id=$row_product['product_id'];
            $pro_title=$row_product['product_title'];
            $pro_price=$row_product['product_price'];
            $pro_main_img=$row_product['product_main_img'];

            echo "<div class='col-md-4 col-sm-6'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/product_images/$pro_main_img' alt='product main image' class='img-responsive'>
                        <div class='text'>
                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                            <p class='price'>INR $pro_price</p>
                            <p class='buttons'><a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add To Cart</a>
                            <p>
                        </div>
                        <a>
                    </div>
            </div>";
        }
    }
    // fetching products in index page End


    // fetch Product Categories from db for sidebar.php Start
    function getPCats(){
        global $db;
        $get_p_cats="SELECT * FROM product_categories";
        $run_p_cats=mysqli_query($db,$get_p_cats);
        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
            $p_cat_id=$row_p_cats['p_cat_id'];
            $p_cat_title=$row_p_cats['p_cat_title'];
            echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
        }
    }
    // fetch Product Categories from db for sidebar.php End


    // fetch Categories from db for sidebar.php Start
    function getCats(){
        global $db;
        $get_cats="SELECT * FROM categories";
        $run_cats=mysqli_query($db,$get_cats);
        while($row_cats=mysqli_fetch_array($run_cats)){
            $cat_id=$row_cats['cat_id'];
            $cat_title=$row_cats['cat_title'];
            echo "<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";
        }
    }
    // fetch Categories from db for sidebar.php End

    // Get product from product categories Start
    function getPCatPro(){
        global $db;
        if(isset($_GET['p_cat'])){
            $p_cat_id=$_GET['p_cat'];
            $get_p_cat="SELECT * FROM product_categories WHERE p_cat_id=$p_cat_id";
            $run_p_cat=mysqli_query($db,$get_p_cat);
            $row_p_cat=mysqli_fetch_array($run_p_cat);
            $p_cat_title=$row_p_cat['p_cat_title'];
            $p_cat_desc=$row_p_cat['p_cat_desc'];

            $get_products="SELECT * FROM products where p_cat_id='$p_cat_id'";
            $run_products=mysqli_query($db,$get_products);
            $count=mysqli_num_rows($run_products);
            if($count==0){
                echo "<div class='box'> <!--Box Start-->
                <h1>$p_cat_title<h1>
                <h4>No Product Found in this category.</h4>
                </div> <!--Box End-->";
            }else{
                echo "<div class='box'> <!--Box Start-->
                <h1>$p_cat_title</h1>
                <p>$p_cat_desc</p>
                </div> <!--Box End-->";
            }
            while($row_product=mysqli_fetch_array($run_products)){
                $pro_id=$row_product['product_id'];
                $pro_title=$row_product['product_title'];
                $pro_price=$row_product['product_price'];
                $pro_m_img=$row_product['product_main_img'];

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
                
            }
        }
    // Get product from product categories End

    //Get product from category End
    function getCatPro(){
        global $db;
        if(isset($_GET['cat'])){
            $cats_id=$_GET['cat'];
            echo $cats_id;
            $get_cats="SELECT * FROM categories where cat_id='$cats_id'";
            $run_cats=mysqli_query($db,$get_cats);
            $row_cats=mysqli_fetch_array($run_cats);
            $cat_title=$row_cats['cat_title'];
            $cat_desc=$row_cats['cat_desc'];

            $get_products="SELECT * FROM products WHERE cat_id='$cats_id'";
            $run_products=mysqli_query($db,$get_products);
            $count=mysqli_num_rows($run_products);
            if($count==0){
                echo "<div class='box'> <!--Box Start-->
                <h1>$cat_title<h1>
                <h4>No Product Found in this category.</h4>
                </div> <!--Box End-->";
            }else{
                echo "<div class='box'> <!--Box Start-->
                <h1>$cat_title</h1>
                <p>$cat_desc</p>
                </div> <!--Box End-->";
            }
            while($row_product=mysqli_fetch_array($run_products)){
                $pro_id=$row_product['product_id'];
                $pro_title=$row_product['product_title'];
                $pro_price=$row_product['product_price'];
                $pro_m_img=$row_product['product_main_img'];

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

            }
        }
?>