<div class="box">
    <center>
        <h1>Confirm Account Deletion</h1>
        <br>
    </center>
    <form action="" method="post" align="center">
        <input type="submit" value="Yes, I want to delete" name="yes" class="btn btn-danger">
        <input type="submit" value="No, I dont want to Delete" name="No" class="btn btn-primary">
    </form>
</div>
<?php
    $c_email=$_SESSION['customer_email'];
    if(isset($_POST['yes'])){
        $delete="DELETE FROM customers WHERE customer_email='$c_email'";
        $run_q=mysqli_query($conn,$delete);
        if($run_q){
            session_destroy();
            echo "<script>alert('Account has been successfully deleted')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>