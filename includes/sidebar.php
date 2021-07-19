<div class="panel panel-default sidebar-menu"> <!--Panel Start-->
    
    <div class="panel-heading"> <!--Panel Heading Start-->
        <h3 class="panel-title">Product Categories</h3>
    </div><!--Panel Heading End-->

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <!-- <li><a href="shop.php">Jackets</a></li>
            <li><a href="shop.php">Accessories</a></li>
            <li><a href="shop.php">Shoes</a></li>
            <li><a href="shop.php">Coats</a></li>
            <li><a href="shop.php">T-shirts</a></li> -->
            <?php
            getPCats();
            ?>
        </ul>
    </div>
</div><!--Panel Start-->

<div class="panel panel-default sidebar-menu"> <!--Panel Start-->
    
    <div class="panel-heading"> <!--Panel Heading Start-->
        <h3 class="panel-title">Categories</h3>
    </div><!--Panel Heading End-->

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <!-- <li><a href="shop.php">Men</a></li>
            <li><a href="shop.php">Women</a></li>
            <li><a href="shop.php">Kids</a></li>
            <li><a href="shop.php">Other</a></li> -->
            <?php getCats(); ?>
        </ul>
    </div>
</div><!--Panel Start-->