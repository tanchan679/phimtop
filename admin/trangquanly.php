<div class="boxx" id="Administrators" style="display: flex">
    <div class="roww containerr">
        <div class="menuu">
            <div style="padding-top: 20px; padding-left: 5px;">
                <img style="width: 30px; height: 28px; float: left; padding-right: 5px" src="image/iconadmin3.jpg">
                <span style="color: #FF7610;">Administrators</span>
            </div>
            <br>
            <button onclick="hienthithemphim()" class="btnkgvien" style="border-top: solid 2px #345;">
                    <div class="line-menu" style="color:#fff;">
                        <i style="margin-right: 5px" class="fas fa-plus-square"></i>
                         Thêm phim mới<div>
                </button>
            <div id="themphimmoi" style="display: none">
                <div style="margin-left: 18px;">
                    <form method="get" action="#">
                        <input name = "chucnang" value="themmoi" style="display: none">
                        <input name = "type" value="file" style="display: none">
                        <button class="btnkgvien">
                            <div class="line-menu-lv2" style="color:#f8f8f8;">
                                <i class="fas fa-upload"></i>
                                Tải video lên<div>
                        </button>
                    </form>
                    <form method="get" action="#">
                        <input name = "chucnang" value="themmoi" style="display: none">
                        <input name = "type" value="link" style="display: none">
                        <button class="btnkgvien">
                            <div class="line-menu-lv2" style="color:#f8f8f8;">
                                <i class="fas fa-external-link-alt"></i>
                                Thêm từ liên kết ngoài<div>
                        </button>
                    </form>
                </div>
            </div>
            <form method="get" action="#">
                <input name = "chucnang" value="theloai" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu" style="color:#fff;">
                        <i style="margin-right: 5px" class="fab fa-pied-piper-square"></i>
                        Quản lý thể loại<div>
                </button>
            </form>
            <form method="get" action="#">
                <input name = "chucnang" value="listvideo" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu" style="color:#fff;">
                        <i class="fas fa-th-list"></i>
                        Danh sách video<div>
                </button>
            </form>
            <form method="get" action="#">
                <input name = "chucnang" value="thaydoimatkhau" style="display: none">
                <button class="btnkgvien">
                    <div class="line-menu" style="color:#fff;">
                        <i class="fas fa-key"></i>
                         Thay đổi mật khẩu<div>
                </button>
            </form>

                <button onclick="hienthiweb()"  class="btnkgvien" >
                    <div class="line-menu" style="color:#fff;">
                        <i class="fab fa-blogger-b"></i>
                        Tùy chỉnh Web<div>
                </button>
                <div id="tuychonweb" style="display: none">
                    <div style="margin-left: 18px;">
                        <form method="get" action="#">
                            <input name = "chucnang" value="thaydoilogo" style="display: none">
                            <button class="btnkgvien">
                                <div class="line-menu-lv2" style="color:#f8f8f8;">
                                    <i class="fas fa-edit"></i>
                                    Thay đổi logo<div>
                            </button>
                        </form>
                        <form method="get" action="#">
                            <input name = "chucnang" value="thaydoifavicon" style="display: none">
                            <button class="btnkgvien">
                                <div class="line-menu-lv2" style="color:#f8f8f8;">
                                    <i class="fas fa-tools"></i>
                                    Thay đổi favicon<div>
                            </button>
                        </form>
                        <form method="get" action="#">
                            <input name = "chucnang" value="tuychonmenu" style="display: none">
                            <button class="btnkgvien">
                                <div class="line-menu-lv2" style="color:#f8f8f8;">
                                    <i class="fas fa-hourglass-start"></i>
                                    Tùy chọn menu<div>
                            </button>
                        </form>
                    </div>
                </div>
               <form method="post" action="#">
                   <input name = "act" value="true" style="display: none">
                   <button class="btnkgvien">
                       <div class="line-menu" style="color:#ee1111;">
                       <i class="fas fa-sign-out-alt"></i>
                        Đăng xuất<div>
                   </button>
               </form>
        </div>
        <div class="contentt">
            <div class="menu-conten">
                <?php
                    echo '<div style="margin-left: 10px">';
                       if(isset($_GET['chucnang'])) if( $_GET['chucnang'] == 'themmoi')
                        {
                            echo '<div style="margin-right: 10px;float: left;"><a  class="link-home" href="'.$domain.'/admin/?chucnang=themmoi&type=file">Tải lên</a> </div>';
                            echo '<div style="margin-right: 10px;float: left;"><a  class="link-home" href="'.$domain.'/admin/?chucnang=themmoi&type=link">Liên kết ngoài</a> </div>';
                        }
                    echo "</div>";
                ?>
                <div style="margin-right: 10px;float: right;"><a  class="link-home" href="../"><i style="padding-right: 5px" class="fas fa-home"></i>Vào trang web</a> </div>
            </div>
            <div class="container-conten" >
                <?php
                    if(isset($_GET['chucnang'])){
                        $see = $_GET['chucnang'];
                        if($see == "themmoi"){
                            include "modules/themmoi.php";
                            echo '<script> var getthe = document.getElementById(\'themphimmoi\');
                            getthe.style.display = \'block\';</script>';
                        }
                        elseif($see == "thaydoimatkhau") include "modules/thaydoimatkhau.php";
                        elseif($see == "theloai") include "modules/theloai.php";
                        elseif($see == "listvideo") include "modules/list_video.php";
                        elseif($see == "suathongtinvideo") include "modules/suathongtinvideo.php";
                        elseif($see == "thaydoilogo") {
                            include "modules/thaydoilogo.php";
                           echo '<script> var getthe = document.getElementById(\'tuychonweb\');
                            getthe.style.display = \'block\';</script>';
                        }
                        elseif($see == "thaydoifavicon") {
                            include "modules/thaydoiicon.php";
                            echo '<script> var getthe = document.getElementById(\'tuychonweb\');
                            getthe.style.display = \'block\';</script>';
                        }
                        elseif($see == "tuychonmenu") {
                            include "modules/tuychinhmenu.php";
                            echo '<script> var getthe = document.getElementById(\'tuychonweb\');
                            getthe.style.display = \'block\';</script>';
                        }
                    }else{
                        echo "<div style='color: #bb0000; width: 100%; height: 100%;'>
                                <div style='text-align: center; padding-top: 20%; font-weight: 500;font-size: 70px;'>
                                TRANG QUẢN TRỊ
                            </div>
                            </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php mysqli_close($conn) ?>
<script>
    function hienthithemphim() {
        var getthe = document.getElementById('themphimmoi');
        if (getthe.style.display=='none') getthe.style.display = 'block';
        else getthe.style.display = 'none';
    }
    function hienthiweb() {
        var getthe = document.getElementById('tuychonweb');
        if (getthe.style.display=='none') getthe.style.display = 'block';
        else getthe.style.display = 'none';

    }
</script>
