<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<?php
    if(isset($_GET['delete_cat'])){
        $delete_cat_id=$_GET['delete_cat'];
        $delete_cat="DELETE FROM product_categories WHERE cat_id='$delete_cat_id'";
        $run_delete=mysqli_query($conn,$delete_cat);
        if($run_delete){
            echo "<script>alert('Product Categories has been deleted.')</script>";
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }
    }
?>