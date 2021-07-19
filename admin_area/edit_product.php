<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
if(iseet($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $get_p="SELECT * FROM products WHERE product_id='$edit_id'";
    $run_edit=mysqli_query($conn,$get_p);
    $row=mysqli_fetch_array($run_edit);
    $p_id=$row_edit['product_id'];
    $p_title=$row_edit['product_title'];
    $p_cat_id=$row_edit['product_cat_id'];
    $cat_id=$row_edit['cat_id'];
    $p_m_img=$row_edit['product_main_img'];
    $p_img1=$row_edit['product_img1'];
    $p_img2=$row_edit['product_img2'];
    $p_price=$row_edit['product_price'];
    $p_desc=$row_edit['product_desc'];
    $p_keyword=$row_edit['product_keyword'];
}
$get_p_cat="SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
$run_p_cat=mysqli_query($conn,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_title=$row_p_cat['p_cat_title'];
$get_cat="SELECT * FROM categories WHERE cat_id='$cat_id";
$run_cat=mysqli_query($conn,$get_cat);
$row_cat=mysqli_fetch_array($run_cat);
$cat_title=$row_cat['cat_title'];

?>
<div class="row"> <!--Breadcrumb row start-->
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"> <i class="fa fa-dashboard"></i> Dashboard / Edit Product </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> Edit Product
                </h3>
            </div>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Title</label>
                        <div class="col-md-6">
                            <input type="text" name="product_title" required="" value="<?php echo $p_title; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category</label>
                        <div class="col-md-6">
                            <select name="product_cat" class="form-control">
                                <option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></option>

                                <?php
                                    $get_p_cats="SELECT * FROM product_categories";
                                    $run_p_cats=mysqli_query($conn,$get_p_cats);
                                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        $p_cat_id=$row_p_cats['p_cat_id'];
                                        $p_cat_title=$row_p_cats['p_cat_title'];
                                        echo "<option value='$p_cat_id;'>$p_cat_title;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Category</label>
                        <div class="col-md-6">
                            <select name="cat" class="form-control">
                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>

                                <?php
                                    $get_cats="SELECT * FROM categories";
                                    $run_cats=mysqli_query($conn,$get_cats);
                                    while($row_cats=mysqli_fetch_array($run_cats)){
                                        $cat_id=$row_cats['cat_id'];
                                        $cat_title=$row_cats['cat_title'];
                                        echo "<option value='$cat_id;'>$cat_title;</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Main Image</label>
                        <div class="col-md-6">
                            <input type="file" name="product_m_img" required class="form-control"> <br> <img src="product_images/<?php echo $p_m_img; ?>" alt="product main image" width="70" height="70" >
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image 1</label>
                        <div class="col-md-6">
                            <input type="file" name="product_img1" required class="form-control"> <br> <img src="product_images/<?php echo $p_img1; ?>" alt="product image 1" width="70" height="70" >
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image 2</label>
                        <div class="col-md-6">
                            <input type="file" name="product_img2" required class="form-control"> <br> <img src="product_images/<?php echo $p_img2; ?>" alt="product image 2" width="70" height="70" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Price</label>
                        <div class="col-md-6">
                            <input type="text" name="product_price" required="" value="<?php echo $p_price; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Keywords</label>
                        <div class="col-md-6">
                            <input type="text" name="product_keyword" required="" value="<?php echo $p_keyword; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description</label>
                        <div class="col-md-6">
                            <textarea name="product_desc" required="" rows="6" cols="19" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description</label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

if(isset($_POST['update'])){
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $cat=$_POST['cat'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keyword=$_POST['product_keyword'];

    $product_main_img=$_FILES['product_m_img']['name'];
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];

    $product_tmp_main_img=$_FILES['product_m_img']['tmp_name'];
    $product_tmp_img1=$_FILES['product_img1']['tmp_name'];
    $product_tmp_img2=$_FILES['product_img2']['tmp_name'];

    move_uploaded_file($product_tmp_main_img,"product_images/$product_main_img");
    move_uploaded_file($product_tmp_img1,"product_images/$product_img1");
    move_uploaded_file($product_tmp_img2,"product_images/$product_img2");

    $update_product="UPDATE products SET p_cat_id='{$product_cat}, cat_id='{$cat}, date=NOW(),product_title='{$product_title}',product_main_img='{$product_main_img}', product_img1='{$product_img1}', product_img2='{$product_img2}', product_price='{$product_price}',product_desc='$product_desc',product_keyword='$product_keyword' WHERE product_id='$p_id'";

    $run_update=mysqli_query($conn,$update_product);

    if($run_update){
        echo "<script>alert('Product updated Successfully.')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
}
?>