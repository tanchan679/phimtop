<?php
    if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
        echo "Đăng xuất";
    }
    elseif (isset($_GET['xem-video'])){
        $getid = $_GET['xem-video'];
        $gettile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT tenvideo from list_video where  id = $getid"))['tenvideo'];
        echo $gettile;

    }elseif (isset($_GET['xem'])){
        echo "Tài khoản người dùng";
    }
    else{
        echo "Phimtop.top - Trang xem phim số 1";
    }
?>