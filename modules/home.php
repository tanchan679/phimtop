<br>
<div class="container">
            <?php
               if(isset($_GET['thetype'])){
                   $theloai = $_GET['thetype'];
                   $sql = "Select * from list_video where id_theloai=$theloai";
                   $getnametheloai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT tentheloai FROM theloai where id = $theloai"))['tentheloai'];
                   echo '<div style="color: #bbb; font-size: 20px; margin-bottom: 5px; margin-left: -10px">'.$getnametheloai.'</div>';
               }else{
                   $sql = "Select * from list_video";
                   echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 400px; width: 100%">
    <div class="carousel-item active">
      <img src="https://cdn.tgdd.vn/Files/2020/02/16/1236798/top-12-series-phim-hay-nhat-tren-netflix-2020-6.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://esperando.cc/wp-content/uploads/2020/04/phim-ve-chien-tranh-hay-1024x576.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://vtv1.mediacdn.vn/thumb_w/650/2019/11/12/fast-furious-9-cuong-phim-758x379-157354345504297662112.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> <br><br>
<div style="color: #bbb; font-size: 24px; margin-bottom: 5px; margin-left: -10px">Danh sách video</div>

';
               }
                $data = mysqli_query($conn, $sql);
                if(mysqli_num_rows($data) > 0){
                   echo '<div class="row">';
                    while ($getdt = mysqli_fetch_assoc($data)){
                        echo'
                                 <div class="col-md-3 col-s4 col-6 list_video">
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
                    echo '</div>';
                }
            ?>
        </div>
<br>