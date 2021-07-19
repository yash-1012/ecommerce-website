<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
    if(isset($_GET['delete_slider'])){
        $slider_id=$_GET['delete_slider'];
        $delete_slider="DELETE FROM slider where slider_id='$slider_id'";
        $run_delete=mysqli_query($conn,$delete_slider);
        if($run_delete){
        echo "<script>alert('slider has been deleted.')</script>";
        echo "<script>window.open('index.php?view_slider','_self')</script>";
        }
    }
?>
