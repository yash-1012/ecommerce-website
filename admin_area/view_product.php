<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ View Product
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> View Products
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table-bordered table-hover table table-striped">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Product Keyword</th>
                                <th>Product Date</th>
                                <th>Product Delete</th>
                                <th>Product Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                $get_products="SELECT * FROM products";
                                $run_products=mysqli_query($conn,$get_products);
                                while($row_pro=mysqli_fetch_array($run_products)){
                                    $pro_id=$row_pro['product_id'];
                                    $pro_title=$row_pro['product_title'];
                                    $pro_m_img=$row_pro['product_main_img'];
                                    $pro_price=$row_pro['product_price'];
                                    $pro_keyword=$row_pro['product_keywords'];
                                    $pro_date=$row_pro['date'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pro_title;?></td>
                                <td><img src="product_images/<?php echo $pro_m_img; ?>" alt="$pro_id" width="20" height="20"></td>
                                <td><?php echo $pro_price; ?></td>
                                <td><?php echo $pro_keyword; ?></td>
                                <td><?php echo $pro_date; ?></td>
                                <td> <a href="index.php?delete_product= <?php echo $pro_id; ?>" class="pull-left"><i class="fa fa-trash-0"></i> Delete</a></td>
                                <td> <a href="index.php?edit_product= <?php echo $pro_id; ?>" class="pull-right"><i class="fa fa-pencil-0"></i> Edit</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>