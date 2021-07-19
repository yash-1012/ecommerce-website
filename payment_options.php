<div class="box">
    <?php
    $session_email=$_SESSION['customer_email'];
    $select_customer="SELECT * FROM customers WHERE customer_email='$session_email'";
    $run_cust=mysqli_query($conn,$select_customer);
    $row_customer=mysqli_fetch_array($run_cust);
    $customer_id=$row_customer['customer_id'];
?>
    <h1 class="text-center">Payment Options</h1>
    <p class="lead text-center">
        <a href="order.php?c_id=<?php echo $customer_id ?>">Pay Offline</a>
    </p>
    <center>
        <p class="lead">
            <a href="">Pay using Paypal.
            <img src="images/paypal.jpg" alt="paypal" width="500" height="270" class="img-responsive"></a>
        </p>
    </center>
</div>