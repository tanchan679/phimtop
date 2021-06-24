<!DOCTYPE>
<html>
<head>
    <?php include 'config.php';?>
    <title>Đăng nhập tài khoản người dùng</title>
    <link rel="stylesheet" href="include/style/bootstrap.css">
    <link rel="stylesheet" href="<?php echo "$domain"."/include/style/mycss31.css"?>">
    <link rel="stylesheet" href="include/fontawesome/css/all.css">
    <?php
    $icon = mysqli_fetch_assoc(mysqli_query($conn,"SELECT giatri FROM tuychinhweb where thuoctinh='icon'"))['giatri'];
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $icon?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<?php
include "modules/header.php";
?>
    <div style="width: 100%; margin-bottom: 30px; margin-top: 30px;">
        <form class="from-dangky" method="post" action="#"">
            <div style="text-align: center">  <H3>Đăng nhập người dùng</H3></div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control"  id="email" required="" placeholder="nguyenvana@gmail.com" name="email">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control"  id="password" required="" placeholder="Nhập vào mật khẩu" name="password">
            </div>
            <div style="text-align: center"><button style="margin-top: 10px;" class="btn btn-primary">Đăng nhập</button></div>
            <div style="text-align: right"><a href="<?php echo $domain.'/registration.php'?>">Đăng ký</a></div>
        </form>
    </div>
    <?php
     include "modules/footer.php";
    ?>
<?php
if( isset($_POST['email'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if((strlen(strstr($email,"@")) <= 0 || strlen(strstr($email,".")) <= 0) && $email!='admin')
        echo '<script>alert("Email không hợp lệ")</script>';
    else{
        $sql="select * from user where (email='$email')";
        $kt=mysqli_query($conn, $sql);
        if(mysqli_num_rows($kt)  > 0){
            $temp = mysqli_fetch_assoc($kt);
            $getpass = $temp['password'];
            if($getpass == $pass)
            {
                $_SESSION['user'] = $email;
               echo '<script>window.location="'.$domain.'";</script>';
            }else{
                echo '<script>alert("Mật khẩu không đúng")</script>';
            }
        }else{
            echo '<script>alert("Tài khoản với email '.$email.' chưa được đăng ký")</script>';
        }
    }
}
mysqli_close($conn);
?>
</body>
</html>
