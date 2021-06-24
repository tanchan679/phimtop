<?php include '../config.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php include 'modules/gettitlee.php' ?></title>
    <link rel="icon" href="image/iconadmin3.jpg">
    <link rel="stylesheet" href="../include/fontawesome/css/all.css">
    <link rel="stylesheet" href="../include/style/bootstrap.css">
    <link rel="stylesheet" href="mycss8.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../include/script/ckeditorbasic/ckeditor.js"></script>
</head>
<body>
    <?php
       if(!isset($_SESSION['loginadmin']))
       {
            if(isset($_POST['email'])) {
                $getdata = mysqli_query($conn, "SELECT password from user where email = 'admin'");
                $adminpass = mysqli_fetch_assoc($getdata)['password'];
               if (($_POST['password'] == $adminpass && $_POST['email'] == "admin")) {
                   $_SESSION['loginadmin'] = 2;
                   unset($_POST['password']);
               }
               if(!isset($_SESSION['loginadmin'])) echo '<script>alert("Tài khoản và mật khẩu không đúng")</script>';
           }
       }
        if(isset($_POST['act'])){
            unset($_POST['act']);
            unset($_SESSION['loginadmin']);
        }
        if(isset($_SESSION['loginadmin']))
            include 'trangquanly.php';
        else include 'login.php';
    ?>
</body>
</html>