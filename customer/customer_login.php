<div class="box"> <!-- box start-->
    <div class="box-header"><!-- box-header start-->
        <center>
            <h2>Login</h2>
            <p class="lead">Already Our Customer.</p>
        </center>
    </div><!-- box-header End-->
    <br><br>
    <form action="checkout.php" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="c_email" required="" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="c_password" required="" class="form-control">
        </div>
        <div class="text-center">
            <button name="login" value="login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Login
            </button>
        </div>
    </form>
    <center>
        <a href="//customer_registration.php">
            <h3>New? Register Now</h3>
        </a>
    </center>
</div><!-- box End-->

<?php
    if(isset($_POST['login'])){
        $customer_email=$_POST['c_email'];
        $customer_password=$_POST['c_password'];
        $select_customer="SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_password'";
        $run_customer=mysqli_query($conn,$select_customer);
        $get_ip=getUserIP();
        $check_customer=mysqli_num_rows($run_customer);
        
        $select_cart="SELECT * FROM cart WHERE ip_add='$get_ip'";
        $run_cart=mysqli_query($conn,$select_cart);
        $check_cart=mysqli_num_rows($run_cart);
        
        if($check_customer==0){
            echo "<script>alert('Password or Email is incorrect.')</script>";
            exit();
        }
        if($check_customer==1 AND $check_cart==0){
            $_SESSION['customer_email']=$customer_email;
            echo "<script>window.open('customer/myaccount.php',(_self))</script>";
        }else{
            $_SESSION['customer_email']=$customer_email;
            echo "<script>window.open('checkout.php',(_self))</script>";
        }
        
    }
?>