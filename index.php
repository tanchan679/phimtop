<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <?php include 'config.php';?>
    <link rel="stylesheet" href="include/style/bootstrap.css">
    <?php
    $icon = mysqli_fetch_assoc(mysqli_query($conn,"SELECT giatri FROM tuychinhweb where thuoctinh='icon'"))['giatri'];
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $icon?>">
    <link rel="stylesheet" href="include/fontawesome/css/all.css">
    <title><?php include 'modules/gettitlee.php'?></title>
    <link rel="stylesheet" href="<?php echo $domain."/include/style/mycss31.css"?>">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="include/script/ckeditorbasic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo $domain."/include/js/myjs.js"?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_SESSION['user']) && $_SESSION['user'] =='admin'){
    echo '<div style="background: #12306f; height: 32px; line-height: 32px; ">
            <a style="color: #ee0000;" href="'.$domain.'/admin"><i style="margin-left: 15px; margin-right: 5px; color: #fd7e14 " class="fas fa-user-lock"></i>Trang quản trị</a>
</div>';
}
    include "modules/header.php";
    if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
        include "include/logout.php";
        $CLlogout = new logout;
        $CLlogout->logoutuser();
        echo '<script>window.location="'.$domain.'";</script>';
    }
    if (isset($_GET['xem-video'])){
        include 'modules/xemvideo.php';

    }elseif (isset($_GET['xem'])){
        include 'modules/nguoidung.php';
    }elseif(isset($_GET['search'])){
        include 'modules/search.php';
    }
    else{
        include "modules/home.php";
    }
    include "modules/footer.php";
    mysqli_close($conn);
?>
</body>
</html>
