<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
    if(isset($_GET['delete_payment'])){
        $delete_id=$_GET['delete_payment'];
        $delete="DELETE FROM payments WHERE payment_id='$delete_id'";
        $run_delete=mysqli_query($conn,$delete);
        if($run_delete){
            echo "<script>alert('Payment has been deleted.')</script>";
            echo "<script>window.open('index.php?view_payment','_self')</script>";
        }
    }
?>