<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
if(iseet($_GET['edit_p_cat']){
    $edit_id=$_GET['edit_p_cat'];
    $get_p_cat="SELECT * FROM product_categories WHERE p_cat_id='$edit_id'";
    $run_edit_p_cat=mysqli_query($conn,$get_p_cat);
    $row=mysqli_fetch_array($run_edit_p_cat);
    $p_cat_id=$row['p_cat_id'];
    $p_cat_title=$row['p_cat_title'];
    $p_cat_desc=$row['p_cat_desc'];
}
?>

<div class="row"> <!--Breadcrumb row start-->
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"> <i class="fa fa-dashboard"></i> Dashboard / Edit Product Categories </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> Edit Product Categories
                </h3>
            </div>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                                <input type="text" name="p_cat_title" required="" value="<?php echo $p_cat_title; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                            <textarea name="p_cat_desc" rows="6" cols="19" class="form-control"></textarea>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Product Category" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

if(isset($_POST['update'])){
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];

    $update_p_cat="UPDATE product_categories SET p_cat_title='{$p_cat_title}',p_cat_desc='$p_cat_desc' WHERE p_cat_id='$p_cat_id'";
    $run_update=mysqli_query($conn,$update_p_cat);

    if($run_update){
        echo "<script>alert('Product Category updated Successfully.')</script>";
        echo "<script>window.open('index.php?view_product_cat','_self')</script>";
    }
}

?>