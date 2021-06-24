<!DOCTYPE>
<html>
<head>
    <?php include 'config.php';?>
    <title>Đăng ký tài khoản người dùng</title>
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
        <form class="from-dangky" method="post" action="#" style="margin-top: 30px; margin-bottom: 30px">
            <div style="text-align: center">  <H3>Đăng ký tài khoản người dùng</H3></div>
                <div class="form-group">
                    <label id="tieudeten">Tên</label>
                    <input type="text" class="form-control"   id="name" required="" placeholder="Nguyễn Văn A" name="name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="email" required="" placeholder="nguyenvana@gmail.com" name="email">
                </div>
            <div id="emaill" style="display:none;background: #f5c6cb;padding: 3px;border-left: #e00 solid 5px;">Emailkhông hợp lệ</div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control"  id="password" required="" placeholder="Nhập vào mật khẩu" name="password">
                </div>
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control"  id="password2" required="" placeholder="Nhập lại mật khẩu" name="password2">
                </div>
                 <div id="passerror" style="display:none;background: #f5c6cb;padding: 3px;border-left: #e00 solid 5px;">Mật khẩu không khớp</div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" id="phonenumber"  required="" placeholder="0347194217" name="phonenumber">
                </div>
            <div id="sdt" style="display:none;background: #f5c6cb;padding: 3px;border-left: #e00 solid 5px;">Số điện thoại không hợp lệ</div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="address"   required=""  placeholder="xóm Sơn Tiến- xã Quyết thắng - tp.Thái Nguyên - tỉnh Thái Nguyên" name="address">
                </div>
                <div style="text-align: center"><button style="margin-top: 10px;" class="btn btn-primary">Đăng ký</button></div>
                <div style="text-align: right"><a href="<?php echo $domain.'/login.php'?>">Đăng nhập</a></div>
        </form>
<?php
include "modules/footer.php";
?>
<?php
if(isset($_POST['name'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $avatar = $domain."/upload/image/avatar/defaultavatr.jpg";
    include "include/classnumber.php";
    $classnumber = new classnumber;
    $hl = true;
    if(strlen(strstr($email,"@")) <= 0 || strlen(strstr($email,".")) <= 0){
        echo '<script>document.getElementById("emaill").style.display = "block"</script>';
        $hl = false;
    }
    if(!$classnumber->itemstringisnumber($phonenumber)){
        echo '<script>document.getElementById("sdt").style.display = "block"</script>';
        $hl = false;
    }
    if($password!=$password2){
        echo '<script>document.getElementById("passerror").style.display = "block"</script>';
        $hl = false;
    }elseif(strlen($password) < 5){
        echo '<script>alert("Đăng ký thất bại, mật khẩu phải có trên 5 ký tự")</script>';
        $hl = false;
    }
    if($hl==true){
        $sql="select * from user where email='$email'";
        $kt=mysqli_query($conn, $sql);
        if(mysqli_num_rows($kt)  > 0){
            echo '<script>alert("Đăng ký thất bại..email đã tồn tại")</script>';
        }else{
            $sql ="INSERT INTO user values(NULL, '$email', '$password', '$name', '$phonenumber', '$address','$avatar')";
            mysqli_query($conn, $sql);
            $_SESSION['user']=$email;
            echo '<script>window.location="'.$domain.'";</script>';
        }
    }
}
mysqli_close($conn);
?>
</body>
</html>