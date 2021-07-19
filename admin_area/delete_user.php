<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
    if(isset($_GET['delete_user'])){
        $delete_id=$_GET['delete_user'];
        $delete="DELETE FROM admins WHERE cat_id='$delete_id'";
        $run_delete=mysqli_query($conn,$delete);
        if($run_delete){
            echo "<script>alert('Admin User has been deleted.')</script>";
            echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    }
?>