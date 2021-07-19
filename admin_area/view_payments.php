<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ View Payment
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> View Payment
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table-bordered table-hover table table-striped">
                        <thead>
                                <tr>
                                <th>Payment No.</th>
                                <th>Invoice No.</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Reference No</th>
                                <th>Payment Date</th>
                                <th>Delete Payment</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                $get_c="SELECT * FROM payments";
                                $run_c=mysqli_query($conn,$get_c);
                                while($row_c=mysqli_fetch_array($run_c)){
                                    $payment_id=$row_c['payment_id'];
                                    $invoice_no=$row_c['invoice_no'];
                                    $amount=$row_c['amount'];
                                    $pay_mode=$row_c['payment_mode'];
                                    $ref_no=$row_c['ref_no'];
                                    $pay_date=$row_c['payment_date'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                </td bgcolor="yellow" <?php echo $invoice_no; ?>>
                                <td><?php echo $amount;?></td>
                                <td><?php echo $pay_mode;?></td>
                                <td><?php echo $ref_no;?></td>
                                <td><?php echo $pay_date;?></td>
                                <td><?php echo $pay_date;?></td>
                                <td>
                                    <a href="index.php?delete_payment=<?php echo $order_id; ?>"><i class="fa fa-trash-0"></i> Delete
                                    </a>
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