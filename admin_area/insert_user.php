<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>

<div class="row"> <!--Breadcrumb row start-->
        <div class="col-lg-12"> <!-- col-lg-12 start-->
            <div class="breadcrumb"> <!--Breadcrumb Start-->
                <li class="active">
                    <i class="fa fa-dashboard"></i>
                    Dashboard / Insert User
                </li>
            </div><!--Breadcrumb End-->
        </div> <!-- col-lg-12 End-->
    </div><!--Breadcrumb row End-->


<div class="row"> <!--row start-->
    <div class="col-lg-12"> <!--col-lg-6 Start-->
        <div class="panel panel-default"> <!--Panel Panel-default Start-->

            <div class="panel-heading"> <!--panel-heading Start-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-w"></i>
                    Insert User
                </h3>
            </div><!--panel-heading End-->

            <div class="panel-body"> <!--Panel-body Start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name*</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" required="" class="form-control">
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
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div>

<?php
    if(isset($_POST['submit'])){
        $admin_name=$_POST['admin_name'];
        $admin_email=$_POST['admin_email'];
        $admin_pass=$_POST['admin_pass'];
        $admin_country=$_POST['admin_country'];
        $admin_job=$_POST['admin_job'];
        $admin_contact=$_POST['admin_contact'];
        $admin_about=$_POST['admin_about'];
        $admin_image=$_POST['admin_image']['name'];
        $admin_image_tmp_name=$_POST['admin_image']['tmp_name'];
        move_uploaded_file($admin_image_tmp_name,admin_images/$admin_image);
        $insert_admin="INSERT INTO admins (admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) VALUES ('{$admin_name}','{$admin_email}','{$admin_pass}','{$admin_image}','{$admin_contact}','{$admin_country}','{$admin_job}','{$admin_about}')";
        $run_admin=mysqli_query($conn,$insert_admin);
        if($run_admin){
        echo "<script>alert('New User Successfully inserted.')</script>";
        echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    }
?>