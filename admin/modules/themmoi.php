<?php

if(isset($_POST['name'])){
    if(isset($_FILES['video']) && $_FILES['video']['error'] == 0)
    {
        echo '<script> alert("vao day ne")';
        //lay phan mo rong cua file
        $imageFileType = pathinfo($_FILES['video']['name'],PATHINFO_EXTENSION);
        //cac kieu file hop le
        $allowtypes = array('mp4', 'avi','mkv','vob','flv');
        if (in_array($imageFileType,$allowtypes ))
        {
            $file = $_FILES['video']['tmp_name'];
            $pathvd = "../upload/video/".$_FILES['video']['name'];
            move_uploaded_file($file, $pathvd);

            $pathvd =  $domain."/upload/video/".$_FILES['video']['name'];
            $tenvideo = $_POST['name'];
            $mota = $_POST['mota'];
            $quocgia = $_POST['quocgia'];
            $theloai = $_POST['theloai'];
            $pathav = $domain."/upload/image/noavata.jpg";
            if($_FILES['imgInp']['error'] == 0)
            {
                //lay phan mo rong cua file
                $imageFileType = pathinfo($_FILES['imgInp']['name'],PATHINFO_EXTENSION);
                //cac kieu file hop le
                $allowtypes = array('jpg', 'png');
                if (in_array($imageFileType,$allowtypes ))
                {
                    $file = $_FILES['imgInp']['tmp_name'];
                    $pathav = "../upload/image/".$_FILES['imgInp']['name'];
                    move_uploaded_file($file, $pathav);
                    $pathav =  $domain."/upload/image/".$_FILES['imgInp']['name'];
                }else{
                    echo '<script>alert("ảnh đại diện phải có định dạng JPG, PNG")</script>';
                }
            }
            $sql = "INSERT INTO list_video values(NULL , $theloai, '$tenvideo','$pathvd','$pathav','$mota','$quocgia')";
            mysqli_query($conn, $sql);
            echo '<script>alert("Video đã được thêm thành công")</script>';
            echo '<script>window.location="'.$domain.'/admin/?chucnang=themmoi&type=file";</script>';
        }else{
            echo '<script>alert("Định dạng video không hợp lệ")</script>';
        }
    }else{
        $pathvd = $_POST['linkvideo'];
        $tenvideo = $_POST['name'];
        $mota = $_POST['mota'];
        $quocgia = $_POST['quocgia'];
        $theloai = $_POST['theloai'];
        $pathav = $domain."/upload/image/noavata.jpg";
        if($_FILES['imgInp']['error'] == 0)
        {
            //lay phan mo rong cua file
            $imageFileType = pathinfo($_FILES['imgInp']['name'],PATHINFO_EXTENSION);
            //cac kieu file hop le
            $allowtypes = array('jpg', 'png');
            if (in_array($imageFileType,$allowtypes ))
            {
                $file = $_FILES['imgInp']['tmp_name'];
                $pathav = "../upload/image/imgvideo/".$_FILES['imgInp']['name'];
                move_uploaded_file($file, $pathav);
                $pathav =  $domain."/upload/image/imgvideo/".$_FILES['imgInp']['name'];
            }else{
                echo '<script>alert("ảnh đại diện phải có định dạng JPG, PNG")</script>';
            }
        }
        $sql = "INSERT INTO list_video values(NULL , $theloai, '$tenvideo','$pathvd','$pathav','$mota','$quocgia')";
        mysqli_query($conn, $sql);
        echo '<script>alert("Video đã được thêm thành công")</script>';
        echo '<script>window.location="'.$domain.'/admin/?chucnang=themmoi&type=link";</script>';
    }
}
?>
<div style="background: #0056b3; height: 33px; color: #f2f2f2; font-size: 18px; padding-left: 10px; line-height: 33px; ">
    <i class="fas fa-plus-square"></i>
    <?php   if(isset($_GET['type']) && $_GET['type'] === 'link') echo "Liên kết video";
    else echo 'Tải lên video';
        ?>
</div>

<div style="display: block;  padding: 10px" id="editinfo" >
    <form method="post" action="#"  enctype="multipart/form-data">
            <div style="background: #fff; padding-bottom: 20px; margin-left: 25px; width: 500px; padding: 15px; box-shadow: 0px 0px 6px 0px #123">

                <input style="display: none" type="text" value="userpage" name="see">
                <div style="text-align: center; margin-top: 20px; margin-bottom: 20px">
                   <?php
                   if(isset($_GET['type']) && $_GET['type'] === 'link'){
                        echo '
                        <div class="form-group">
                       <label id="tenvideo">Đường dẫn liên kết tới video</label>
                       <input type="text" class="form-control"    id="linkvideo" required="" placeholder="" name="video">
                   </div>';
                   }else{
                       echo ' <input type="file"  id="video" name="video">';
                   }
                   ?>
                </div>
               <div style="background: #f2f2f2; padding: 10px">
                   <div class="form-group">
                       <label id="tenvideo">Tên video</label>
                       <input type="text" class="form-control"    id="name" required="" placeholder="" name="name">
                   </div>
                   <div class="form-group">
                       <label for="">Mô tả</label>
                       <textarea name="mota" id="mota"></textarea>
                       <script>CKEDITOR.replace('mota');</script>
                   </div>
                   <div class="form-group">
                       <label for="">Thể loại</label>
                       <select name="theloai" style="border: solid 1px #117a8b; border-radius: 2px">
                           <?php
                                $data = mysqli_query($conn,"SELECT * FROM theloai");
                                while ($getdata = mysqli_fetch_assoc($data)){
                                    echo '<option value="'.$getdata['id'].'">'.$getdata['tentheloai'].'</option>';
                                }
                           ?>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="">Quốc gia</label>
                       <input type="text" class="form-control" id="quocgia"    placeholder="" name="quocgia">
                   </div>
                   <div class="form-group">
                       <label for="">Ảnh đại diện</label><br>
                       <img id="blah" src="#" alt="Ảnh đại diện" style="height: 140px; width: 200px;" /><br>
                       <input type='file' name="imgInp" id="imgInp" />
                   </div>
                   <div style="text-align: center"><button  class="btn-edituser">THÊM VIDEO</button></div>
               </div>
            </div>
    </form>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>
