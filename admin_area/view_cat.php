<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ View Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> View Categories
                </h3>
            </div>
            <div class="panel-body">
            <div class="table-responsive">
                    <table class="table-bordered table-hover table table-striped">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Title</th>
                                <th>Category Description</th>
                                <th>Delete Category</th>
                                <th>Edit Category</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $i=0;
                            $gecats="SELECT * FROM categories";
                                $run_cats=mysqli_query($conn,$get_cats);
                                while($row_cat=mysqli_fetch_array($run_cats)){
                                    $cat_id=$row_cat['cat_id'];
                                    $cat_title=$row_cat['cat_title'];
                                    $cat_desc=$row_cat['cat_desc'];
                                    $i++;
                        ?>
                            <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $cat_title; ?></td>
                                    <td><?php echo $cat_desc; ?></td>
                                    <td> <a href="index.php?delete_cat= <?php echo $cat_id; ?>"></a><i class="fa fa-trash-0"></i> Delete</td>
                                    <td> <a href="index.php?edit_cat= <?php echo $cat_id; ?>"></a><i class="fa fa-pencil-0"></i> Edit</td>
                                </tr>
                            <?php } ?>
                        </tbody>