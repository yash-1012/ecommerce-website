<div class="panel panel-default sidebar-menu"> <!--Panel Start-->
    
    <div class="panel-heading"> <!--Panel Heading Start-->
        <?php
        $session_customer=$_SESSION['customer_email'];
        $get_cust="SELECT * FROM customers WHERE customer_email='$session_customer'";
        $run_cust=mysqli_query($conn,$get_cust);
        $row_cust=mysqli_fetch_array($run_cust);
        $customer_image=$row_cust['customer_image'];
        $customer_name=$row_cust['customer_name'];
        if(!isset($_SESSION['customer_email'])){

        }else{
        echo "<center>
            <img src='customer_images/$customer_image' alt='customer_image' class='img-responsive'>
        </center>
        <br>
        <h3 align='center' class='panel-title'>Name: $customer_name</h3>";
        }
        ?>

    </div><!--Panel Heading End-->

    <div class="panel-body"> <!--panel-body Start-->
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if(isset($_GET['my_order'])){echo "active";}?> ">    
                <a href="my_account.php?my_order"> <i class="fa fa-list"> </i> My Order</a>
            </li>
            
            <li class="<?php if(isset($_GET['my_address']))echo "active"; ?>">
                <a href="my_account.php?my_address">
                <i class="fa fa-user"> </i> My Addresses</a>
            </li>

            <li class="<?php if(isset($_GET['pay_offline']))echo "active"; ?>">
                <a href="my_account.php?pay_offline">
                <i class="fa fa-bolt"> </i> Pay Offline</a>
            </li>
            
            <li class="<?php if(isset($_GET['edit_act']))echo "active"; ?>">
                <a href="my_account.php?edit_act">
                <i class="fa fa-pencil"> </i> Edit Account</a>
            </li>
            
            <li class="<?php if(isset($_GET['change_pass']))echo "active"; ?>">
                <a href="my_account.php?change_pass">
                <i class="fa fa-user"> </i> Change Password</a>
            </li>
            
            <li class="<?php if(isset($_GET['delete_ac']))echo "active"; ?>">
                <a href="my_account.php?delete_ac">
                <i class="fa fa-sign-out"> </i> Delete Account</a>
            </li>
            
            <li class="<?php if(isset($_GET['logout']))echo "active"; ?>">
                <a href="my_account.php?logout">
                <i class="fa fa-bolt"> </i> Logout</a>
            </li>
        </ul>

    </div><!--panel-body End-->

</div><!--Panel Start-->