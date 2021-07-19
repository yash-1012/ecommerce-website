<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
if(iseet($_GET['edit_cat']){
    $edit_id=$_GET['edit_cat'];
    $get_cat="SELECT * FROM product_categories WHERE cat_id='$edit_id'";
    $run_edit_cat=mysqli_query($conn,$get_cat);
    $row=mysqli_fetch_array($run_edit_cat);
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];
    $cat_desc=$row['cat_desc'];
}
?>

<div class="row"> <!--Breadcrumb row start-->
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"> <i class="fa fa-dashboard"></i> Dashboard / Edit Categories </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> Edit Categories
                </h3>
            </div>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Title</label>
                        <div class="col-md-6">
                            <input type="text" name="cat_title" required="" value="<?php echo $cat_title; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Description</label>
                        <div class="col-md-6">
                        <textarea name="cat_desc" rows="6" cols="19" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if(isset($_POST['update'])){
    $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_desc'];

    $update_cat="UPDATE categories SET cat_title='{$cat_title}',cat_desc='$cat_desc' WHERE cat_id='$cat_id'";
    $run_update=mysqli_query($conn,$update_cat);

    if($run_update){
        echo "<script>alert('Category updated Successfully.')</script>";
        echo "<script>window.open('index.php?view_cat','_self')</script>";
    }
}

?>