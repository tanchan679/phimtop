<div class="navbar" style="background:#1d2124;z-index: 100;box-shadow: 0px 0.5px 3px 0.5px #bcbcbc;width: 100%;">
    <div class="container">
        <ul class="nav">
            <li>
                <a href="<?php echo $domain?>">
                    <?php
                        $logo = mysqli_fetch_assoc(mysqli_query($conn,"SELECT giatri FROM tuychinhweb where thuoctinh='logo'"))['giatri'];
                    ?>
                    <img src="<?php echo $logo?>" style="max-height: 60px;max-width: 200px;">
                </a>
            </li>
        </ul>
       <ul class="nav">
           <li>
               <a style="text-decoration: none;" href="<?php if(!isset($_SESSION['user'])) echo $domain.'/login.php';
                                else echo $domain.'/?xem=nguoidung'
               ?>">
                   <?php if(!isset($_SESSION['user'])) echo '<button class="btn-account">
                       Tài khoản
                   </button>';
                   else {
                       $getid = $_SESSION['user'];
                       $getdata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name,avatar from user where email = '$getid'"));
                       echo '<div style="float:right" class="btn-user" ">'.$getdata['name'].'</div>
                        <img style="float:right; height: 40px; width: 40px; border-radius: 40px; margin-right: 3px;" src="'.$getdata['avatar'].'"> ';
                   }
                   ?>

               </a>
           </li>
       </ul>
    </div>
</div>
<div class="navbar" style="  background: #2e383c; margin: 0px;">
    <div class="container">
        <ul class="nav menutop">
            <?php
               $data = mysqli_query($conn, "SELECT * from theloai");
               if(mysqli_num_rows($data) > 0){
                   while ($getdata = mysqli_fetch_assoc($data)){
                       if($getdata['onmenu'] === '1'){
                           $gettheloai = $getdata['id'];
                           $check = mysqli_query($conn,"SELECT * from list_video where id_theloai = '$gettheloai'");
                           if(mysqli_num_rows($check) > 0){
                               echo '<li>
                                   <a href="'.$domain.'/?thetype='.$getdata['id'].'">
                                      '.$getdata['tentheloai'].'
                                   </a>
                                </li>';
                           }
                       }
                   }
               }
            ?></ul>
        <ul class="nav menutop">
            <li>
                <div class="box">
                    <div class="container-1">
                        <form style="margin: 0px; padding: 0px;">
                            <input name="search" type="search" id="search" placeholder="Search..." />
                            <button type="submit" value="Tìm kiếm" class="searchphim">
                                <span class="icon"><i class="fa fa-search"></i></span>
                                Tìm
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="container">