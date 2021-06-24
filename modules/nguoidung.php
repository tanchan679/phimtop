<?php
if(isset($_POST['name'])){
    if( $_POST['email']=='admin'){
        $arr1  = 'admin';
        $arr2 = 'Admin';
        echo '<script>alert("Email và tên admin không thể thay đổi")</script>';
    }
   else{
       $arr1  = $_POST['email'];
       $arr2 = $_POST['name'];
   }
    $arr3 = $_POST['address'];
    $arr4 = $_POST['phonenumber'];
    $arr5 = $_SESSION['user'];
    $sql = "UPDATE user SET name= '$arr2',phonenumber='$arr4',address='$arr3' WHERE email = '$arr5'";
    mysqli_query($conn, $sql);
    $sql = "SELECT email from user where email = '$arr1'";
    $data = mysqli_query($conn, $sql);
    if(mysqli_num_rows($data) > 0){
        $getdata = mysqli_fetch_assoc($data)['email'];
        if($_SESSION['user'] != $getdata)  echo '<script>alert("Thay đổi email thất bại, tài khoản với email '.$arr1.' đã tồn tại.")</script>';
    }else{
        if(strlen(strstr($arr1,"@")) <= 0 || strlen(strstr($arr1,".")) <= 0) echo '<script>alert("Email thay đổi không hợp lệ")</script>';
        else{
            $sql = "UPDATE user SET email='$arr1' WHERE email = '$arr5'";
            mysqli_query($conn, $sql);
            $_SESSION['loginid'] = $_POST['email'];
        }
    }
    if($_FILES['avatar']['error'] == 0)
    {
        //lay phan mo rong cua file
        $imageFileType = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
        //cac kieu file hop le
        $allowtypes    = array('jpg', 'png');
        if (in_array($imageFileType,$allowtypes ))
        {
            $file = $_FILES['avatar']['tmp_name'];
            $path = "upload/image/avatar/".$_FILES['avatar']['name'];
            $_SESSION['avatar'] = $path;
            $sql = "UPDATE user SET avatar='$path' WHERE email = '$arr1'";
            move_uploaded_file($file, $path);
            $path  = $domain."/upload/image/avatar/".$_FILES['avatar']['name'];
            mysqli_query($conn, $sql);
        }else{
            echo '<script>alert("File ảnh upload phải có định dạng JPG, PNG")</script>';
        }
    }
    echo '<script>window.location="'.$domain.'?xem=nguoidung";</script>';
}

if(isset($_POST['passold'])){
    $passold = $_POST['passold'];
    $passnew = $_POST['passnew'];
    $pasnew2 = $_POST['passnew2'];
    $getemail = $_SESSION['user'];
    $sql = "SELECT password from user where email = '$getemail'";
    $getpass = mysqli_fetch_assoc(mysqli_query($conn, $sql))['password'];
    echo  $getpass . $passold;
    if($getpass!=$passold)  echo '<script>alert("Mật khẩu thay đổi thất bại...mật khẩu cũ không đúng.")</script>';
    else if($passnew!=$pasnew2) echo '<script>alert("Mật khẩu thay đổi thất bại...mật khẩu mới không khớp.")</script>';
    else if(strlen($passnew) < 5)echo '<script>alert("Đăng ký thất bại, mật khẩu mới phải có trên 5 ký tự")</script>';
    else{
        $email = $_SESSION['user'];
        $sql = "UPDATE user SET password='$passnew' WHERE email = '$email'";
        echo '<script>alert("Mật khẩu của bạn đã được thay đổi thành công")</script>';
        echo '<script>window.location="'.$domain.'?xem=nguoidung";</script>';
        mysqli_query($conn, $sql);
    }
}
?>
    <div class="row" style="margin-top: 25px; margin-bottom: 25px">
        <div class="col-md-3">
            <div class="left-content">
                <div style="line-height: 35px">Quản lý tài khoản</div>
                <div class="shedbackgroundwhite" style="text-align: left">
                    <a class="a-hideunderline" href="?xem=nguoidung">
                        <div class="linetext-user">Thông tin cá nhân</div>
                    </a>
                    <a class="a-hideunderline" href="?xem=thaydoithongtin">
                        <div class="linetext-user">Thay đổi thông tin</div>
                    </a>
                    <a class="a-hideunderline" href="?xem=thaydoimatkhau">
                        <div class="linetext-user">Thay đổi mật khẩu</div>
                    </a>
                    <form method="get" action="#">
                        <input style="display: none"  value="true" name="logout">
                        <button class="btn-logout">Đăng xuất</button>
                    </form>
                </div>
            </div> <br>
        </div>
        <div class="col-md-8">
            <?php
            $getemail = $_SESSION['user'];
            $sql = "SELECT * FROM user where email = '$getemail'";
            $getdata = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            ?>
            <!--Xem thong tin-->
            <?php
                $xem = $_GET['xem'];
               if ($xem=='nguoidung') echo '<div class="left-content">
                <div id="viewuser" style="text-align: left; padding: 15px">
                    <div style="font-weight: 500; color: #fff;">THÔNG TIN CÁ NHÂN</div><hr style="background: #ccc">
                    <div class="row" style="text-align: left">
                        <div class="col-md-5" style="text-align: center">
                            <img class="img-avatar" src="'.$getdata['avatar'].'"><br>
                            <div style="font-weight: 500; font-size: 25px; color:#f8f8f8 ">'.$getdata['name'].'</div>
                        </div>
                        <div class="col-md-7">
                            Tên <div style="font-weight: 500;color: #a1a1a1">'.$getdata['name'].'</div>
                            <hr style="background: #ccc">
                           Email <div style="font-weight: 500;color:#a1a1a1">'.$getdata['email'].'</div>
                            <hr style="background: #ccc">
                           Số điện thoại <div style="font-weight: 500;color:#a1a1a1">'.$getdata['phonenumber'].'</div>
                            <hr style="background: #ccc">
                           Địa chỉ <div style="font-weight: 500;color:#a1a1a1">'.$getdata['address'].'</div>
                        </div>
                    </div>
                   
                </div>
            </div>';
               elseif($xem=='thaydoithongtin') echo '
 <!--Sua thong tin-->
               <div class="left-content" style="padding: 15px; text-align: left">
            <div style="display: block" id="editinfo" >
                <div style="font-weight: 500;  color: #fcfcfc">SỬA THÔNG TIN CÁ NHÂN</div><hr style="background: #ccc">
                <form method="post" action="#"  enctype="multipart/form-data">
                    <input style="display: none" type="text" value="userpage" name="see">
                    <div style="text-align: center">
                        <img id="blah" class="img-avatar" id="blah" src="'.$getdata['avatar'].'"><br>
                        <input type="file"  id="imgInp" name="avatar">
                    </div>
                    <div class="form-group">
                        <label id="tieudeten">Tên</label>
                        <input type="text" class="form-control"   value="'.$getdata['name'].'"  id="name" required="" placeholder="Nguyễn Văn A" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control"  value="'.$getdata['email'].'" id="email" required="" placeholder="nguyenvana@gmail.com" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" value="'.$getdata['phonenumber'].'" id="phonenumber" required="" placeholder="0347194217" name="phonenumber">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control" id="address"  value="'.$getdata['address'].'" required=""  placeholder="xóm Sơn Tiến- xã Quyết thắng - tp.Thái Nguyên - tỉnh Thái Nguyên" name="address">
                    </div>
                    <div style="text-align: center"><button  class="btn-edituser">CHỈNH SỬA</button></div>
                </form>
                <a href="?xem=nguoidung"><div style="text-align: center"><button  class="btn-editusercancel">HỦY BỎ</button></div></a>
            </div>
            </div>
               ';
               elseif($xem=='thaydoimatkhau') echo '
  <!--Trang thay mat khau-->
                  <div class="left-content" style="padding: 15px; text-align: left">
            <div style="id="editpass" >
                <div style="font-weight: 500;  color: #f8f8f8">THAY ĐỔI MẬT KHẨU</div>
                <form method="post" action="#"  enctype="multipart/form-data">
                    <hr style="background: #ccc">
                    <input style="display: none" type="text" value="userpage" name="see">
                    <div class="form-group">
                        <label id="tieudeten">Nhập mật khẩu hiện  tại:</label>
                        <input type="password" class="form-control"    required="" value=""  name="passold">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập mật khẩu mới: </label>
                        <input type="password" class="form-control"   required=""  name="passnew">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control"   required=""  name="passnew2">
                    </div>
                    <div style="text-align: center"><button  class="btn-edituser">Thay đổi</button></div>
                </form>
                <a href="?xem=nguoidung"><div style="text-align: center"><button  class="btn-editusercancel">Hủy bỏ</button></div></a>
            </div>
            </div>
               ';
            ?>

        </div>
    </div>
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>