<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ View Product Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> View Product Categories
                </h3>
            </div>
            <div class="panel-body">
            <div class="table-responsive">
                    <table class="table-bordered table-hover table table-striped">
                        <thead>
                            <tr>
                                <th>Product Category ID</th>
                                <th>Product Category Title</th>
                                <th>Product Category Desc</th>
                                <th>DeleteProduct Category </th>
                                <th>EditProduct Category </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $i=0;
                            $get_p_cats="SELECT * FROM product_categories";
                                $run_p_cats=mysqli_query($conn,$get_p_cats);
                                while($row_p_cat=mysqli_fetch_array($run_p_cats)){
                                    $p_cat_id=$row_p_cat['p_cat_id'];
                                    $p_cat_title=$row_p_cat['p_cat_title'];
                                    $p_cat_desc=$row_p_cat['p_cat_desc'];
                                    $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p_cat_title; ?></td>
                                <td><?php echo $p_cat_desc; ?></td>
                                <td> <a href="index.php?delete_p_cat= <?php echo $p_cat_id; ?>"></a><i class="fa fa-trash-0"></i> Delete</td>
                                <td> <a href="index.php?edit_p_cat= <?php echo $p_cat_id; ?>"></a><i class="fa fa-pencil-0"></i> Edit</td>
                            </tr>
                        <?php } ?>

                        </tbody>