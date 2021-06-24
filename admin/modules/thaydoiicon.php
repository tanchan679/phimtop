<?php
if(isset($_POST['check'])){
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
                $sql = "UPDATE tuychinhweb SET giatri='$pathav' WHERE thuoctinh = 'icon'";
                mysqli_query($conn, $sql);
                echo '<script>alert("Favicon đã được thay đổi!")</script>';
            }else{
                echo '<script>alert("ảnh đại diện phải có định dạng JPG, PNG")</script>';
            }
        }
        echo '<script>window.location="'.$domain.'/admin/?chucnang=thaydoifavicon";</script>';
}
?>
<div style="background: #0056b3; height: 33px; color: #f2f2f2; font-size: 18px; padding-left: 10px; line-height: 33px; ">
    <i class="fas fa-key"></i>
    Thay đổi Favicon Web
</div>
<div style="background: #fff; padding: 20px; margin: auto; width: 350px; margin-top: 60px; border-radius: 3px; box-shadow: 0px 0px 3px 3px #95999c; ">
    <div style="text-align: center;">  <H4>Thay đổi Favicon Web</H4></div>
    <form method="post" action="#"  enctype="multipart/form-data">
        <input style="display: none" name="check">
        <div class="form-group">
            <?php
            $getFavicon = mysqli_fetch_assoc(mysqli_query($conn, "SELECT giatri FROM tuychinhweb where thuoctinh = 'icon'"))['giatri'];
            ?>
            <img id="blah" src="<?php echo $getFavicon?>" alt="Ảnh đại diện" style="height: 140px; width: 200px;" /><br>
            <br>
            <input type='file' name="imgInp" id="imgInp" />
        </div>
        <div style="text-align: center"><button style="margin-top: 10px;" class="btn btn-primary">Thay đổi</button></div>
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
