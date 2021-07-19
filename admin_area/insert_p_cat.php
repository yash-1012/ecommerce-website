<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <a href="index.php?dashboard"> Dashboard </a>/ Insert Product Category
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
                <form enctype=",ultipart/form-data" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category Title</label>
                        <div class="col-md-6">
                            <input type="text" name="p_cat_title" required="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category Description</label>
                        <div class="col-md-6">
                            <textarea name="p_cat_desc" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="submit" class="btn btn-primary form-control">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $p_cat_title=$_POST['p_cat_title'];
        $p_cat_desc=$_POST['p_cat_desc'];
        $insert_p_cat="INSERT INTO product_categories (p_cat_title,p_cat_desc) VALUES ('{$p_cat_title}','{$p_cat_desc}')";
        $run_p_cat=mysqli_query($conn,$insert_p_cat);
        if($run_p_cat){
        echo "<script>alert('New Product Category Successfully inserted.')</script>";
        echo "<script>window.open('index.php?view_product_cat','_self')</script>";
        }
    }



?>