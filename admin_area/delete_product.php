<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
        $delete_pro="DELETE FROM products where product_id='$delete_id'";
        $run_delete=mysqli_query($conn,$delete_pro);
        if($run_delete){
        echo "<script>alert('Product has been deleted.')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
        }
    }
?>