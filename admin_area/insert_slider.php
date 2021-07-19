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
                Dashboard / Insert Slider
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
                        Insert Slider
                    </h3>
                </div><!--panel-heading End-->

                <div class="panel-body"> <!--Panel-body Start-->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!-- Product Title-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slide Name</label>
                            <div class="col-md-6">
                                <input type="text" name="slide_name" required="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Slide Url</label>
                            <div class="col-md-6">
                                <input type="text" name="slide_url" required="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider Image</label>
                            <div class="col-md-6">
                                <input type="file" name="slide_image" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $slide_name=$_POST['slide_name'];
        $slide_url=$_POST['slide_url'];
        $slide_image=$_POST['slide_image']['name'];
        $slide_tmp_name=$_POST['slide_image']['tmp_name'];

        $view_slide="SELECT * FROM slider";
        $run_slide=mysqli_query($conn,$view_slide);
        $count=mysqli_num_rows($run_slide);
        if($count<4){
            move_uploaded_file($slide_tmp_name,'slides_images/$slide_image');
            $insert_slide="INSERT INTO slider (slide_name,slide_image,slide_url) VALUES ('{$slide_name}','{$slide_image}','{$slide_url}')";
            $run_insert_slide=mysqli_query($conn,$insert_slide);
            if($run_insert_slide){
                echo "<script>alert('New Slide Successfully inserted.')</script>";
                echo "<script>window.open('index.php?view_slider','_self')</script>";
            }
        }else{
            echo "<script>alert('You have already inserted 4 slider images.')</script>";

        }
?>



