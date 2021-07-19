<?php
    // if(!isset($_SESSION['admin_email'])){
    //     echo "<script>window.open('login.php','_self')</script>";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Insert Product</title>
<link rel="stylesheet" href="../style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- tiny mce cdn text-editor-->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="row"> <!--Breadcrumb row start-->
        <div class="col-lg-12"> <!-- col-lg-12 start-->
            <div class="breadcrumb"> <!--Breadcrumb Start-->
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Insert Product
                </li>
            </div><!--Breadcrumb End-->
        </div> <!-- col-lg-12 End-->
    </div><!--Breadcrumb row End-->


    <div class="row"> <!--row start-->
        <div class="col-lg-3"></div>
        <div class="col-lg-6"> <!--col-lg-6 Start-->
            <div class="panel panel-default"> <!--Panel Panel-default Start-->

                <div class="panel-heading"> <!--panel-heading Start-->
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i>
                        Insert Product
                    </h3>
                </div><!--panel-heading End-->

                <div class="panel-body"> <!--Panel-body Start-->
                    <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- Product Title-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Title*</label>
                            <input type="text" name="product_title" required="" class="form-control">
                        </div>

                        <!-- Product Category-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category*</label>
                            <select name="product_cat" class="form-control" required="">
                                <option>Select A Product Category</option>
                                    <?php
                                        // $get_p_cats="select * from product_categories";
                                        // $run_p_cats=mysqli_query($conn,$get_p_cats);
                                        // while($row=mysqli_fetch_array($run_p_cats)){
                                        //     $id=$row['p_cat_id'];
                                        //     $cat_title=$row['p_cat_title'];
                                        //     echo"<option value='$id'>$id $cat_title</option>";
                                        // }
                                    ?>
                            </select>
                        </div>

                        <!-- Categories-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Categories</label>
                            <select name="cat" class="form-control">
                                <option>Select Category</option>
                                <?php
                                    // $get_cats="select * from categories";
                                    // $run_cats=mysqli_query($conn,$get_cats);
                                    // while($row=mysqli_fetch_array($run_cats)){
                                    //     $id=$row['cat_id'];
                                    //     $cat_title=$row['cat_title'];
                                    //     echo"<option value='$id'>$id $cat_title</option>";
                                    // }
                                ?>
                            </select>
                        </div>

                        <!-- Product Main Image-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Main Image*</label>
                            <input type="file" name="product_main_image" required="" class="form-control">
                        </div>

                        <!-- Product Image 1-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 2(Optional)</label>
                            <input type="file" name="product_img1" class="form-control">
                        </div>

                        <!-- Product Image 2-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 3(optional)</label>
                            <input type="file" name="product_img2" class="form-control">
                        </div>

                        <!-- Product Price-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price*</label>
                            <input type="text" name="product_price" required="" class="form-control">
                        </div>

                        <!-- Product Description-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description*</label><br>
                            <div class="col-md-12">
                            <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea></div>
                        </div>

                        <!-- Product Keywords-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keywords(optional)</label>
                            <input type="text" name="product_keywords" class="form-control">
                        </div>

                        <!-- Form Submit Button-->
                        <div class="form-group">
                            <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
                        </div>

                    </form>
                </div><!--Panel-body End-->

            </div><!--Panel Panel-default End-->
        </div><!--col-lg-6 End-->
    </div><!--row End-->
    <div class="col-lg-3"></div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>
</html>

<?php
if(isset($_POST['submit'])){
    $product_title=$_POST['product_title'];
    $product_category=$_POST['product_cat'];
    // echo "$product_category";
    $category=$_POST['cat'];
    // echo "$category";
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keyword=$_POST['product_keywords'];
    
    $product_name_main_image=$_FILES['product_main_image']['name'];
    $product_name_image1=$_FILES['product_img1']['name'];
    $product_name_image2=$_FILES['product_img2']['name'];

    $temp_name_main=$_FILES['product_main_image']['tmp_name'];
    $temp_name_img1=$_FILES['product_img1']['tmp_name'];
    $temp_name_img2=$_FILES['product_img2']['tmp_name'];

    move_uploaded_file($temp_name_main,"product_images/$product_name_main_image");
    move_uploaded_file($temp_name_img1,"product_images/$product_name_image1");
    move_uploaded_file($temp_name_img2,"product_images/$product_name_image2");

    $insert_product_query="INSERT INTO products (p_cat_id, cat_id,product_title, product_main_img, product_img1, product_img2, product_price, product_desc, product_keyword) VALUES ('$product_category','$category','$product_title','$product_name_main_image','$product_name_image1','$product_name_image2','$product_price','$product_desc','$product_keyword')";

    // "INSERT INTO `products` (`p_cat_id`, `cat_id`, `date`, `product_title`, `product_main_img`, `product_img1`, `product_img2`, `product_price`, `product_desc`, `product_keyword`) VALUES ('1', '1', current_timestamp(), 'fgfdgdf', 'gdgdfg', 'gdfgdf', 'gdgf', '24', 'sdffsd', 'fdsfsd')"

    $run_product=mysqli_query($conn,$insert_product_query);
    if(!$run_product)
    {
        echo "Error MySQLI QUERY: ".mysqli_error($conn)."";
        die();
    }
    else
    {
        echo "Query succesfully executed!";
    } 

    if($run_product){
        echo "<script>alert('Product inserted successfully.')</script>";
        // echo "<script>windows.open('index.php?view_product','_self')</script>";
    }
}


?>