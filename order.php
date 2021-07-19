<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php
    if(isset($_GET['c_id'])){
        $customer_id=$_GET['c_id'];
    }
    $ip_add=getUserIP();
    $status="pending";
    $invoice_no=rand();
    $select_cart="SELECT * FROM cart where ip_add='$ip_add'";
    $run_cart=mysqli_query($conn,$select_cart);
    while($row_cart=mysqli_fetch_array($run_cart)){
        $pro_id=$row_cart['p_id'];
        $size=$row_cart['size'];
        $qty=$row_cart['qty'];

        $get_product="SELECT * FROM products WHERE product_id='$pro_id'";
        $run_product=mysqli_query($conn,$get_product);
        while ($row_pro=mysqli_fetch_array($run_product)) {
            $subtotal=$row_pro['product_price']*$qty;
            $insert_order="INSERT INTO `customer_order` (`customer_id`, `product_id`,`due_amount`, `invoice_no.`, `qty`, `size`, `order_date`, `order_status`) VALUES ('{$customer_id}','{$pro_id}', '{$subtotal}', '{$invoice_no}', '{$qty}', '{$size}', current_timestamp(), '{$status}')";
            $run_cus_order=mysqli_query($conn,$insert_order);
            // $insert_pending_order="INSERT INTO `pending_orders` (`customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES ('{$customer_id}', '{$invoice_no}', '{$pro_id}', '{$qty}', '{$size}', '{$status}')";
            // $run_pending_order=mysqli_query($conn,$insert_pending_order);
            $delete_cart=" DELETE FROM cart WHERE ip_add='$ip_add'";
            $run_delete=mysqli_query($conn,$delete_cart);
            echo "<script>alert('Your Order has been placed.Thank you')</scipt>";
            echo "<script>window.open('customer/my_account.php?my_order','_self')</scipt>";
        }
    }
?>