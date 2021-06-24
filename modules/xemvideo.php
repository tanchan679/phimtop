<?php
if (isset($_POST['cmt'])){
    $id_user = $_SESSION['user'];
    $id_post = $_GET['xem-video'];
    $cmt = $_POST['cmt'];
    $sql="INSERT INTO comment values(NULL ,'$id_user', $id_post, '$cmt')";
    mysqli_query($conn, $sql);
    echo '<script>window.location="'.$domain.'/?xem-video='.$id_post.'";</script>';
}
?>
<div class="container">
    <div class="row" style="margin-bottom: 25px; margin-top: 25px;">
            <?php
            $getvideo= $_GET['xem-video'];
            $getdta = mysqli_fetch_assoc(mysqli_query($conn, "select * from list_video where id = '$getvideo'"));
            $theloai = $getdta['id_theloai'];
            ?>
            <div class="col-md-9" style="padding: 6px">
                <iframe class="fr-video" src="<?php echo $getdta['link']?>" frameborder="0">
                </iframe>
                <H4 style="color: #f8f8f8; margin-top: 10px;"><?php echo $getdta['tenvideo']?></H4>
                <div style="color: #fff ">Quốc gia: <span style="color: #aaa"><?php echo $getdta['quocgia']?></span></div>
                <?php $gettl = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM theloai where id = $theloai"))?>
                <div style="color: #fff ">Thể loại: <span style="color: #aaa"><?php echo $gettl['tentheloai']?></span></div>
                <span id="mota" style="color: #eee; font-size: 13px; display: none">
                    <?php echo $getdta['mota']?></span>
                <div onclick="hienthimota()" id="htmota" style="color:#FF7610; margin-top: 15px;font-size: 15px; cursor: default">HIỂN THỊ MÔ TẢ <i class="fas fa-angle-down"></i></div>
                <div style="height: 3px; width: 100%; background: #333; margin-top: 60px;"></div>
                <div style="color: #ccc; margin-top: 10px;">BÌNH LUẬN VÀ NHẬN XÉT</div>
                <div style="width: 100%;  background: #ddd; border-radius: 3px; padding: 10px">
                    <?php
                        if(isset($_SESSION['user'])){
                            echo '<form method="post">
                                        <textarea name="cmt" id="cmt" style=" "></textarea>
                                        <div style="text-align: right; margin-top: 15px">
                                            <button class="btn btn-secondary">Đăng nhận xét</button>
</form>
                    </div><script> CKEDITOR.replace(\'cmt\');</script>';
                        }else{
                            echo 'Vui lòng <a href="'.$domain.'/login.php">đăng nhập</a> để bình luận!!';
                        }
                    ?>
                    <hr>
                    <?php
                        $getid = $_GET['xem-video'];
                        $getavatar = array();
                        $getcmt = array();
                        $getname = array();
                         $dem=0;
                         $data = mysqli_query($conn, "SELECT * FROM comment WHERE id_post = $getid");
                         if(mysqli_num_rows($data) > 0) while ($getdata= mysqli_fetch_assoc($data)) {
                             $getcmt[$dem] = $getdata['cmt'];
                             $getemail = $getdata['id_user'];
                             $getuser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE email = '$getemail'"));
                             $getavatar[$dem] = $getuser['avatar'];
                             $getname[$dem] = $getuser['name'];
                             $dem++;
                         }
                    ?>
                    <div style="color: #6c757d; font-size: 11px;margin-top: -14px; margin-left: 5px; margin-bottom: 10px;">Có <?php echo $dem ?> bình luận và nhận xét</div>
                    <?php   while(--$dem >= 0){
                    ?>
                    <div class="row">
                        <div class="col-1" style="text-align: center">
                            <img class="imgicon-avatar-cmt" style="float:left" src="<?php echo $getavatar[$dem]?>">
                        </div>
                        <div class="col-11">
                            <span style="font-weight: 500"><?php echo $getname[$dem]?></span><br>
                            <?php echo $getcmt[$dem]?>

                        </div>
                    </div><br>
                    <?php } ?>
                </div>
                <br>
            </div>
        <div class="col-md-3" style=" padding: 6px;"  >
            <p style="font-weight: 500; color: #f8f8f8; font-size: 19px">Có thể bạn thích</p>
            <?php
            $sql = "Select * from list_video";
            $data = mysqli_query($conn, $sql);
            if(mysqli_num_rows($data) > 0 ){
                $dem=0;
                while ($getdt = mysqli_fetch_assoc($data)){
                    if($dem++ > 6) break;
                    echo'
                                 <div class="list_video">
                                    <form method="get">
                                    <button style="background: none; border: none">
                                    <input style="display: none" name="xem-video" value="'.$getdt['id'].'">
                                    <img src="'.$getdt['linkavatar'].'" class="img_listvd">
                                    <p class="fr_namevideo">'.$getdt['tenvideo'].'</p>
                               
</button>
</form>
                            </div>
                            ';

                }
            }
            ?>
        </div>
    </div>
</div>
<script>
    function hienthimota() {
        var mota = document.getElementById('mota');
        var htmota = document.getElementById('htmota');
        if(mota.style.display == 'none'){
            mota.style.display = 'block';
            htmota.textContent = "Ẩn đi"
        }
        else{
            mota.style.display = 'none';
            htmota.textContent = "HIỂN THỊ MÔ TẢ"
        }
    }
</script>
