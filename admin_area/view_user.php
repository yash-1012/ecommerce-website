<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ View User
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-money"></i> View User
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table-bordered table-hover table table-striped">
                        <thead>
                            <tr>
                            <th>Customer Name</th>
                            <th>User Email</th>
                            <th>User Image</th>
                            <th>User Country</th>
                            <th>User Job</th>
                            <th>Delete User</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $get_c="SELECT * FROM admins";
                            $run_c=mysqli_query($conn,$get_c);
                            while($row_c=mysqli_fetch_array($run_c)){
                                $admin_id=$row_c['admin_id'];
                                $admin_name=$row_c['admin_name'];
                                $admin_email=$row_c['admin_email'];
                                $admin_image=$row_c['admin_image'];
                                $admin_country=$row_c['admin_country'];
                                $admin_job=$row_c['admin_job'];
                        ?>
                        <tr>
                            <td><?php echo $admin_name;?></td>
                            <td><?php echo $admin_email;?></td>
                            <td><img src="../customer/customer_images/<?php echo $admin_image; ?>" alt="" width="60" height="60"></td>
                            <td><?php echo $admin_country;?></td>
                            <td><?php echo $admin_job;?></td>
                            <td> <a href="index.php?delete_user= <?php echo $admin_id; ?>" ><i class="fa fa-trash-0"></i> Delete</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>