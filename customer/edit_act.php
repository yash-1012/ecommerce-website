<?php
$customer_email=$_SESSION['customer_email'];
$get_customer="SELECT * FROM customers WHERE customer_email='$customer_email'";
$run_customer=mysqli_query($conn,$get_customer);
$row_cust=mysqli_fetch_array($run_customer);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
$customer_countrty=$row_cust['customer_country'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_address=$row_cust['customer_add'];
$customer_image=$row_cust['customer_image'];

?>
<div class="box">
    <center>
        <h1>Edit Account</h1>
    </center>
    <form action="edit_act.php" method="post" enctype="multipart/form-data">
        <div class="form-group"> <!-- form-group start-->
            <label>Name</label>
            <input type="text" name="c_name" required="" value="<?php echo $customer_name; ?>" class="form-control">
        </div><!--form-group End-->

        <div class="form-group"> <!--form-group Start-->
            <label>Email</label>
            <input type="text" name="c_email" value="<?php echo $customer_email; ?>" class="form-control" required="">
        </div><!--form-group End-->

        <div class="form-group"><!--form-group Start-->
            <label>Contact Number</label>
            <input type="text" name="c_number" value="<?php echo $customer_contact;?> required="" class="form-control">
        </div><!--form-group End-->

        <div class="form-group"><!--form-group Start-->
            <label>Address</label>
            <input type="text" name="c_address" value="<?php echo $customer_address; ?>" required="" class="form-control">
        </div><!--form-group End-->

        <div class="form-group"><!--form-group Start-->
            <label>City</label>
            <input type="text" name="c_cty" value="<?php echo $customer_city;?>" class="form-control">
        </div><!--form-group End-->

        <div class="form-group"><!--form-group Start-->
            <label>Country</label>
            <input type="text" name="c_country" required="" value="<?php echo $customer_countrty;?>class="form-control">
        </div><!--form-group End-->

        <div class="form-group"><!--form-group Start-->
            <label>Image</label>
            <input type="file" name="c_image" required="" class="form-control">
            <img src="customer_images/<?php echo $customer_image;?>" alt="customer_image" class="img-responsive"  height="100" width="100">
        </div><!--form-group End-->

        <div class="text-center"> <!--text-center Start-->
            <button type="submit" class="btn btn-primary" name="update">
                <i class="fa fa-user-md"></i> Update Now
            </button>
        </div> <!--text-center End-->
    </form>
</div>
<?php
    if(isset($_POST['update'])){
        $update_id=$customer_id;
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_number'];
        $c_address=$_POST['c_address'];
        $c_image=$_FILES['c_image']['name'];
        $c_tmp_image=$_FILES['c_image']['tmp_name'];
        move_uploaded_file($c_tmp_image,"customer_images/$c_image");
        $update_customer="UPDATE customers SET customer_name='{$c_name}',customer_email='{$c_email}' customer_country='{$c_country}' customer_city='{$c_city}' customer_contact='{$c_contact}' customer_add='{$c_address}' customer_image='{$c_image}' WHERE customer_id='{$update_id}'";

        $run_update=mysqli_query($conn,$update_customer);
        if($run_update){
            echo "<scipt>alert('Your details updated.')</scipt>";
            echo"<script>window.open('logout.php','_self')</script>";
        }
    }
?>