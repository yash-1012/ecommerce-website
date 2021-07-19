<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
if(iseet($_GET['edit_slider']){
    $edit_id=$_GET['edit_slider'];
    $edit_slide="SELECT * FROM slider WHERE slider_id='$edit_id'";
    $run_slide=mysqli_query($conn,$edit_slide);
    $row=mysqli_fetch_array($run_slide);
    $slide_id=$row['slide_id'];
    $slide_title=$row['slide_title'];
    $slide_image=$row['slide_image'];
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
                    <i class="fa fa-fw fa-money"></i> Edit Slider
                </h3>
            </div>

            <div class="panel-body">
                <form enctype="multipart/form-data" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Name</label>
                        <div class="col-md-6">
                            <input type="text" name="slider_name" required="" value="<?php echo $slide_title; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider Url</label>
                        <div class="col-md-6">
                            <input type="text" name="slider_url" required="" value="<?php echo $slide_title; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Slider image</label>
                        <div class="col-md-6">
                            <input type="file" name="slider_image" required="" class="form-control"> <br> <img src="slider_images/<?php echo $slide_image; ?>" width="70" height="70">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Slider" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['update'])){
    $slider_name=$_POST['slider_name'];
    $slider_url=$_POST['slider_url'];
    $slider_image=$_FILES['slider_image']['name'];
    $slider_tmp_name=$_FILES['slider_image']['tmp_name'];
    move_uploaded_file($slider_tmp_name,"slider_images/$slider_image");

    $update_slider="UPDATE slider SET slider_name='{$slider_name}',slider_url='{$slider_url}',slider_image='{$slider_image}' WHERE slider_id='$slide_id'";
    $run_slider=mysqli_query($conn,$update_slider);

    if($run_slider){
        echo "<script>alert('Slider updated Successfully.')</script>";
        echo "<script>window.open('index.php?view_slider','_self')</script>";
    }
}

?>