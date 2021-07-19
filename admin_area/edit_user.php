<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
if(iseet($_GET['user_profile']){
    $edit_id=$_GET['user_profile'];
    $get="SELECT * FROM admins WHERE cat_id='$edit_id'";
    $run_edit=mysqli_query($conn,$get);
    $row=mysqli_fetch_array($run_edit);
    $admin_id=$row['admin_id'];
    $admin_email=$row['admin_email'];
    $admin_name=$row['cat_name'];
    $admin_pass=$row['admin_pass'];
    $admin_image=$row['admin_image'];
    $admin_country=$row['admin_country'];
    $admin_job=$row['admin_job'];
    $admin_contact=$row['admin_contact'];
    $admin_contact=$row['admin_about'];
}
?>

<div class="row"> <!--Breadcrumb row start-->
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"> <i class="fa fa-dashboard"></i> Dashboard / Edit User </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> Edit User
                </h3>
            </div>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin Name</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" required="" value="<?php echo $admin_name; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password*</label>
                        <div class="col-md-6">
                            <input type="password" name="admin_pass" required="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">About User*</label>
                        <div class="col-md-6">
                            <textare name="admin_about" required="" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Admin image</label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" required="" class="form-control"> <br> <img src="slider_images/<?php echo $admin_image; ?>" width="70" height="70">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div>

<?php
if(isset($_POST['update'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_pass=$_POST['admin_pass'];
    $admin_country=$_POST['admin_country'];
    $admin_job=$_POST['admin_job'];
    $admin_contact=$_POST['admin_contact'];
    $admin_about=$_POST['admin_about'];
    $admin_image=$_FILES['admin_image']['name'];
    $admin_tmp_name=$_FILES['admin_image']['tmp_name'];
    move_uploaded_file($admin_tmp_name,"slider_images/$admin_image");

    $update_admin="UPDATE slider SET admin_name='{$admin_name}',admin_email='{$admin_email}',admin_pass='{$admin_pass}',admin_image='{$admin_image}',admin_contact='{$admin_contact}',admin_job='{$admin_job}',admin_about='{$admin_about}' WHERE admin_id='$admin_id'";
    $run_admin=mysqli_query($conn,$update_admin);

    if($run_admin){
        echo "<script>alert('Slider updated Successfully.')</script>";
        echo "<script>window.open('index.php?view_admin','_self')</script>";
    }
}

?>