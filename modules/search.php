<br>
<div class="container">
    <?php
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $keysearch = $_GET['search'];
        echo '<span style="color: #f8f8f8; font-size: 25px;">'.$keysearch.'</span><span style="color: #ff0000; font-size: 25px;"> - </span><span style="color: #c8c8c8;font-size: 25px;">Kết quả tìm kiếm</span>';
       echo '<br><br>';
        echo '<div class="box">
                    <div class="container-1">
                        <form style="margin: 0px; padding: 0px;">
                            <input style="width: 450px;" name="search" type="search" id="search" placeholder="Search..." />
                            <button type="submit" value="Tìm kiếm" class="searchphim">
                                <span class="icon"><i class="fa fa-search"></i></span>
                                Tìm
                            </button>
                        </form>
                    </div>
                </div>';
        $sql = "Select * from list_video";
        $data = mysqli_query($conn, $sql);
        $arrID = array();
        $arrName = array();
        $arrAvatar = array();
        $dem = 0;
        if(mysqli_num_rows($data) > 0){
            while ($getdt = mysqli_fetch_assoc($data)){
                $arrID[$dem] = $getdt['id'];
                $arrName[$dem] = $getdt['tenvideo'];
                $arrAvatar[$dem] = $getdt['linkavatar'];
                $dem++;
            }
        }
        $tk=0;
        echo '<div class="row">';
        while (--$dem >=0){
            if(strlen(strstr($arrName[$dem],$keysearch)) > 0)
            {
                $tk=1;
                echo'
                                 <div class="col-md-3 col-s4 col-6 list_video">
                                    <form method="get">
                                    <button style="background: none; border: none">
                                    <input style="display: none" name="xem-video" value="'.$arrID[$dem].'">
                                    <img src="'. $arrAvatar[$dem].'" class="img_listvd">
                                    <p class="fr_namevideo">'. $arrName[$dem].'</p>
                               
</button>
</form>
                            </div>
                            ';
            }

        }
        echo '</div>';
        if($tk==0){
                echo "<br><br><div style='color: #f8f8f8; font-size: 28px;'>Không có kết quả cho tìm kiếm của bạn</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        }
    }else{
        echo '<div class="box">
                    <div class="container-1">
                        <form style="margin: 0px; padding: 0px;">
                            <input style="width: 450px;" name="search" type="search" id="search" placeholder="Search..." />
                            <button type="submit" value="Tìm kiếm" class="searchphim">
                                <span class="icon"><i class="fa fa-search"></i></span>
                                Tìm
                            </button>
                        </form>
                    </div>
                </div>';
        echo "<br><br><div style='color: #f8f8f8; font-size: 28px;'>Không có kết quả cho tìm kiếm của bạn</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    };
    ?>
</div>
<br>