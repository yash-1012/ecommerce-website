<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ View Slider
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <?php
        $get_slider="SELECT * FROM slider";
        $run_slider=mysqli_query($conn,$get_slider);
        while($row_slider=mysqli_fetch_array($run_slider)){
            $slide_id=$row_slider['slider_id'];
            $slide_name=$row_slider['slider_name'];
            $slide_image=$row_slider['slider_image'];

    ?>
    <div class="col-lg-3 col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" align="center">
                    <i class="fa fa-fw fa-money"></i> <?php echo $slide_name; ?>
                </h3>
            </div>
            <div class="panel-body">
               <img src="slider_images/<?php echo $slide_image;?>" class="img-responsive">
            </div>
            <div class="panel-footer">
                <center>
                    <a href="index.php?delete_slider=<?php echo $slide_id ?>" class="pull-left"><i class="fa fa-trash-0"></i> Delete</a>
                    <a href="index.php?edit_slider= <?php echo $slide_id; ?>" class="pull-right"><i class="fa fa-pencil-0"></i> Edit</a></td>
                    <div class="cearfix"></div>
                </center>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


