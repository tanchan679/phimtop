<?php

if(isset($_POST['name'])){
        $tenvideo = $_POST['name'];
        $mota = $_POST['mota'];
        $quocgia = $_POST['quocgia'];
        $theloai = $_POST['theloai'];
        $pathav = $domain."/upload/image/noavata.jpg";
        $getid = $_GET['id'];
        $sql = "UPDATE list_video SET tenvideo= '$tenvideo',mota='$mota',id_theloai='$theloai', quocgia = '$quocgia' WHERE id = '$getid'";
        mysqli_query($conn, $sql);
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
                $sql = "UPDATE list_video SET linkavatar='$pathav' WHERE id = '$getid'";
                mysqli_query($conn, $sql);
            }else{
                echo '<script>alert("ảnh đại diện phải có định dạng JPG, PNG")</script>';
            }
        }
        echo '<script>alert("Thông tin video đã được thay đổi!")</script>';
        echo '<script>window.location="'.$domain.'/admin/?chucnang=listvideo";</script>';
}
?>
<div style="background: #0056b3; height: 33px; color: #f2f2f2; font-size: 18px; padding-left: 10px; line-height: 33px; ">
    <i class="fas fa-plus-square"></i>
    Sửa thông tin video
</div>
<?php
    $getid = $_GET['id'];
    $getdata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM list_video where id = $getid"));
?>
<div style="display: block;  padding: 10px" id="editinfo" >
    <form method="post" action="#"  enctype="multipart/form-data">
        <div style="background: #fff; padding-bottom: 20px; margin-left: 25px; width: 500px; padding: 15px; box-shadow: 0px 0px 6px 0px #123">

            <input style="display: none" type="text" value="userpage" name="see">
            <div style="background: #f2f2f2; padding: 10px">
                <div class="form-group">
                    <label id="tenvideo">Tên video</label>
                    <input type="text" class="form-control"  value="<?php echo $getdata['tenvideo']?>"   id="name" required="" placeholder="" name="name">
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="mota" id="mota" ><?php echo $getdata['tenvideo']?></textarea>
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
                <?php
                $getid = $_GET['id'];
                $getdata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM list_video where id = $getid"));
                ?>
                <div class="form-group">
                    <label for="">Quốc gia</label>
                    <input type="text"  value="<?php echo $getdata['quocgia']?>" class="form-control" id="quocgia"    placeholder="" name="quocgia">
                </div>
                <div class="form-group">
                    <label for="">Ảnh đại diện</label><br>
                    <img id="blah" src="<?php echo $getdata['linkavatar']?>" alt="Ảnh đại diện" style="height: 140px; width: 200px;" /><br><br>
                    <input type='file' name="imgInp" id="imgInp" />
                </div>
                <div style="text-align: center"><button  class="btn-edituser">SỬA ĐỔI</button></div>
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
