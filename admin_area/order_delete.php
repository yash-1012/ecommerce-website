<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
    if(isset($_GET['order_delete'])){
        $delete_id=$_GET['order_delete'];
        $delete_order="DELETE FROM order WHERE order_id='$delete_id'";
        $run_delete=mysqli_query($conn,$delete_order);
        if($run_delete){
            echo "<script>alert('Product Categories has been deleted.')</script>";
            echo "<script>window.open('index.php?view_order','_self')</script>";
        }
    }
?>