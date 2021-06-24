</div><!--contaner-->
<div class="footer" style="padding-bottom: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div style="font-size: 16px; font-weight: 500;">
                    CONTACT
                </div>
                <p style="font-size: 15px">
                    Mọi thông tin liên hệ xin vui lòng<br>
                    Gửi về hòm thư : tanchan679@gmail.com<br>
                    Số điện thoại : 0347194217<br>
                    Địa chỉ liên lệ trực tiếp : ngõ 170, phố Hồn Ma, tp.Đập Đá<br>
                    Xin trân trọng cảm ơn quý khách !
                </p>
            </div>

            <div class="col-md-4">
                <div style=" margin-bottom: 5px;font-size: 16px; font-weight: 500;">
                    KẾT NỐI VỚI CHÚNG TÔI
                </div>
                <a target="_blank" href="https://www.facebook.com/tanchan679"><i  class="fa fa-facebook"style="font-size: 20px; line-height: 26px;"></i></a>
                <a target="_blank" href="https://www.twitter.com/TanChannsl"><i class="fa fa-twitter"style="font-size: 20px; line-height: 26px;"></i></a>
                <a target="_blank" href="https://www.youtube.com/channel/UC5br0QjPF6VSHJkczLzuBUA"><i class="fa fa-youtube"style="font-size: 20px; line-height: 26px;"></i></a>
                <a target="_blank" href="https://www.instagram.com/tanchan1607"><i class="fa fa-instagram" style="font-size: 20px; line-height: 26px;"></i></a>

                <div style="font-size: 16px; font-weight: 500; margin-top: 20px;">
                    LIÊN KẾT
                </div>
                <p style="color: #123;"><a href="https://www.lazada.com/" style="color: #115095">Lazada</a> |
                    <a href="https://shopee.vn/" style="color: #115095">Shopee</a></p>
            </div>

            <div class="col-md-4">
                <div style="font-size: 16px; font-weight: 500;">
                    BÌNH LUẬN MỚI NHẤT</div>
                    <?php
                    $maxid=  mysqli_fetch_assoc(mysqli_query($conn, "SELECT max(id) FROM comment"))['max(id)'];
                    $minid=  mysqli_fetch_assoc(mysqli_query($conn, "SELECT min(id) FROM comment"))['min(id)'];
                    if(isset($maxid)){
                        $i=0;
                        while($i<5 && $maxid >= $minid){
                            $data = mysqli_query($conn, "SELECT *  FROM comment where id = '$maxid'");
                            $maxid--;
                            if(mysqli_num_rows($data) > 0){
                                $getdata= mysqli_fetch_assoc($data);
                                $i++;
                                $getemail = $getdata['id_user'];
                                $getpost = $getdata['id_post'];
                                $getnamepost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT tenvideo FROM list_video where id = '$getpost'"))['tenvideo'];
                                $getuser =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM user WHERE email = '$getemail'"));
                                $getname = $getuser['name'];
                                $url = $domain.'/?xem-video='.$getpost;
                                echo '<div class="newcomment"> <span style="font-weight: 600">'.$getname. '</span">  <span style ="color: #ccc; font-weight:400"> trong </span><a href="'.$url.'"> <span style="color: #026da6 ">'.$getnamepost.'</span></a></div>';
                            }
                        }
                    }
                    ?>
            </div>

        </div>
    </div>
</div>
<div class="barend">
    <div class="container">
        <div>
            <div style="color: #aaa; float: left; font-size: 11px;"><a class="text-link" href="/<?php echo$domain?>">Phimhot.top</a> Copyright © <?php echo date("Y")?> </div>
            <div style="color: #aaa; float: left; margin-left: 5px; font-size: 11px;"> - Thiết kế và phát triển bởi <a target="_blank" class="text-link" href="http://fb.com/tanchan679">
                    Tanchan679</a> </div>
        </div>
        <div style="text-align:end">
            <div  class="mangxahoi">
                <a target="_blank"  class="mangxahoi" href="http://fb.com/tanchan679">
                    Fcacebook</a>
                |
                <a target="_blank" class="mangxahoi" href="https://www.instagram.com/accounts/login/?next=/tanchan1607/">
                    Instagram</a>
                |
                <a target="_blank" class="mangxahoi" href="http://bit.ly/3b6aTdo">
                    Youtube </a></div>
        </div>
    </div>
</div>