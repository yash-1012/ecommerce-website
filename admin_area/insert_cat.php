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
                    Dashboard / Insert Categories
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
                        Insert Categories
                    </h3>
                </div><!--panel-heading End-->

                <div class="panel-body"> <!--Panel-body Start-->
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- Product Title-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category Title*</label>
                            <div class="col-md-6">
                                <input type="text" name="cat_title" required="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Category Description</label>
                            <div class="col-md-6">
                                <textarea name="cat_desc" class="form-control"></textarea>
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
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $cat_title=$_POST['cat_title'];
        $cat_desc=$_POST['cat_desc'];
        $insert_cat="INSERT INTO categories (cat_title,cat_desc) VALUES ('{$cat_title}','{$cat_desc}')";
        $run_cat=mysqli_query($conn,$insert_cat);
        if($run_cat){
        echo "<script>alert('New Category Successfully inserted.')</script>";
        echo "<script>window.open('index.php?view_cat','_self')</script>";
        }
    }
?>
            
            
