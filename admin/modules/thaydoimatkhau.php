<?php
    if(isset($_POST['pass'])){
        $pass=$_POST['pass'];
        $newpass = $_POST['newpass'];
        $newpass1 = $_POST['newpass1'];
        if($newpass!=$newpass1){
            echo '<script>alert("Thay đổi thất bại, mật khẩu không khớp")</script>';
        }
        else if(strlen($newpass) < 5) {
            echo '<script>alert("Thay đổi thất bại, mật khẩu phải có trên 5 ký tự")</script>';
        }
            else{
                $getdata = mysqli_query($conn, "SELECT password from user where email = 'admin'");
                $adminpass = mysqli_fetch_assoc($getdata)['password'];
                if($pass != $adminpass) echo '<script>alert("Thay đổi thất bại, mật khẩu xác nhận không đúng")</script>';
                else{
                    mysqli_query($conn,"UPDATE user set password = '$newpass' where email = 'admin'");
                    echo '<script>alert("Mật khẩu đã được thay đổi thành công")</script>';
                }
            }
        }
?>
<div style="background: #0056b3; height: 33px; color: #f2f2f2; font-size: 18px; padding-left: 10px; line-height: 33px; ">
    <i class="fas fa-key"></i>
    Thay đổi mật khẩu admin
</div>
<div style="background: #fff; padding: 20px; margin: auto; width: 350px; margin-top: 60px; border-radius: 3px; box-shadow: 0px 0px 3px 3px #95999c; ">
    <div style="text-align: center;">  <H4>Thay đổi mật khẩu admin</H4></div>
    <form method="post" action="#">
        <input style="display: none" type="text" value="dangnhap" name="see">
        <div class="form-group">
            <label for="">Mật khẩu mới</label>
            <input type="password" class="form-control"  id="acc" required="" name="newpass">
        </div>
        <div class="form-group">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" class="form-control"  id="password" required="" name="newpass1">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu xác nhận(mật khẩu cũ)</label>
            <input type="password" class="form-control"  id="password" required="" name="pass">
        </div>
        <div style="text-align: center"><button style="margin-top: 10px;" class="btn btn-primary">Thay đổi</button></div>
    </form>
</div>
