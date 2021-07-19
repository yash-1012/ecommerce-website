<?php
session_start();
include('includes/db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="css/login.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <form action="" method="post" class="form-login">
            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" name="admin_email" placeholder="Email" class="form-control">
            <input type="password" name="admin_pass" placeholder="password" class="form-control">
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">Login</button>
            <h4 class="forgot-password">
                <a href="forgot_password.php">Forgot passowrd? Click here</a>
            </h4>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_email=mysqli_real_escape_string($conn,$_POST['admin_email']);
    $admin_pass=mysqli_real_escape_string($conn,$_POST['admin_pass']);
    $get_admin="SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_password='$admin_pass'";
    $run_admin=mysqli_query($conn,$get_admin);
    echo mysqli_error($conn);
    $count=mysqli_num_rows($run_admin);
    if($count==1){
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }else{
        echo "<script>alert('Login Fail. Try again')</script>";
    }
}

?>