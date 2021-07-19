<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
    if(isset($_GET['delete_customer'])){
        $delete_c_id=$_GET['delete_customer'];
        $delete_c="DELETE FROM customers WHERE cat_id='$delete_c_id'";
        $run_delete=mysqli_query($conn,$delete_c);
        if($run_delete){
            echo "<script>alert('Customer has been deleted.')</script>";
            echo "<script>window.open('index.php?view_customer','_self')</script>";
        }
    }
?>