<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ View Orders
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> View Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table-bordered table-hover table table-striped">
                        <thead>
                                <tr>
                                <th>Order No.</th>
                                <th>Customer Email</th>
                                <th>Invoice No.</th>
                                <th>Product Title</th>
                                <th>Product Qty</th>
                                <th>Product Size</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Delete Order</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                $get_c="SELECT * FROM customer_order";
                                $run_c=mysqli_query($conn,$get_c);
                                while($row_c=mysqli_fetch_array($run_c)){
                                    $order_id=$row_c['order_id'];
                                    $c_id=$row_c['customer_id'];
                                    $invoice_no=$row_c['invoice_no.'];
                                    $pro_id=$row_c['product_id'];
                                    $qty=$row_c['qty'];
                                    $size=$row_c['size'];
                                    $date=$row_c['order_date'];
                                    $due_amount=$row_c['due_amount'];
                                    $order_status=$row_c['order_status'];
                                    $get_pro="SELECT * FROM products WHERE product_id='$pro_id'";
                                    $run_pro=mysqli_query($conn,$get_pro);
                                    $row_pro=mysqli_fetch_array($run_pro);
                                    $product_title=$row_pro['product_title'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td>
                                <?php
                                    $get_cust="SELECT * FROM customers WHERE customer_id='$c_id'";
                                    $run_cust=mysqli_query($conn,$get_cust);
                                    $row_cust=mysqli_fetch_array($run_cust);
                                    $c_email=$row_cust['customer_email'];
                                    echo $c_email;
                                                                
                                ?>
                                <td bgcolor="yellow"> <?php echo $invoice_no; ?></td>
                                <td><?php echo $product_title;?></td>
                                <td><?php echo $qty;?></td>
                                <td><?php echo $size;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $due_amount;?></td>
                                <td>
                                <?php 
                                    if($order_status=='pending'){
                                        echo $order_status='pending';
                                    }else{
                                        echo $order_status='complete';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?order_delete=<?php echo $order_id; ?>"><i class="fa fa-trash-0"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>                    