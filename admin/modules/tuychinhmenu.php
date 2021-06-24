<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $getonmenu = $_GET['onmenu'];
    if($id === '0'){
        echo '<script>alert("Mục này không thể chỉnh sửa")</script>';
    }else{
        mysqli_query($conn, "UPDATE theloai set onmenu = $getonmenu where id = $id");
    }
    echo '<script>window.location="'.$domain.'/admin/?chucnang=tuychonmenu";</script>';
}
?>
<div style="background: #0056b3; height: 33px; color: #f2f2f2; font-size: 18px; padding-left: 10px; line-height: 33px; ">
    <i class="fab fa-pied-piper-square"></i>
    Tùy chỉnh menu Web
</div>
<br>
<table style="width: 100%; margin: 5px;">
    <tr style="font-weight: 600; color: #000; font-size: 18px;">
        <td colspan="4" style="text-align: left">
            <i class="fas fa-bars" style="margin-right: 3px;"></i>
            Danh sách các mục trong menu</td>
    </tr>
    <tr style="background: #fff">
        <td style="color: #115095; font-weight: 500">Tên mục</td>
        <td style="color: #115095; font-weight: 500">Số lượng video</td>
        <td style="color: #115095; font-weight: 500">Hiển thị ở menu web</td>
        <td style="color: #115095; font-weight: 500">Hành động</td>
    </tr>
    <?php
    $sql = "SELECT * from theloai";
    $data = mysqli_query($conn, $sql);
    if(mysqli_num_rows($data) > 0){
        $dem=0;
        while ($getdata = mysqli_fetch_assoc($data)){
            $getidthloai = $getdata['id'];
            $getsoluong = mysqli_num_rows(mysqli_query($conn, "Select id from list_video where id_theloai = $getidthloai"));
            if($getidthloai!=0 && $getsoluong > 0){
                echo '<tr style="background: ';
                if($dem++%2 == 0) echo '#f5ffff'; else echo "#fff";
                echo '">
                <td id="name'.$getdata['id'].'" style="color: #b21f2d; font-weight: 500; text-align: left">'.$getdata['tentheloai'].'</td>
                <td style="color: #b21f2d; font-weight: 500">'.$getsoluong.'</td>
                <td style="color: #b21f2d; font-weight: 500">';
                if($getdata['onmenu']==='1') echo '<span style="background: #117a8b; padding-top: 3px; padding-bottom: 3px; padding-left: 20px; padding-right: 20px; color: #fff; border-radius: 3px; font-size: 15px">YES</span>';
                else echo '<span style="background: #ff253a; padding-top: 3px; padding-bottom: 3px; padding-left: 20px; padding-right: 20px; color: #fff; border-radius: 3px; font-size: 15px">NO</span>';
                echo '
                
</td>
                <td style="color: #b21f2d; font-weight: 500">
                        <button  onClick="edititem(this.id)" id="'.$getdata['id'].'" class="btn-edit backgroundbutton">Thay đổi</button>
                </td>
            </tr>';
            }
        }
        ?>
        <div style="display: none" id="num-rows"><?php echo $dem ?></div>
        <script>
            var n=(parseInt(document.getElementById('num-rows').textContent));

        </script>
        <?php
    }
    ?>
</table>


<dialog id="edittheloai" style="border: none; width: 500px; box-shadow: 0px 0px 5px 5px #666; border-radius: 5px">
    <div style="position: absolute; top:0px; right: 0px; border: 0px; color: #c00;cursor: default; width: 25px; height: 25px; text-align: center; line-height: 25px;" id="cancel1">X</div>
    <h5 style="color: #333; margin-bottom: 15px;">Tùy chỉnh menu web</h5>
    <hr>
    <form method="get">
        <input name="chucnang" value="tuychonmenu" style="display: none">
        <div class="form-group">
            <label for="">Tên thể loại: </label>
            <span style="width: 100%; margin-bottom: 15px; font-weight: 500; color: #a71d2a" type="text" id="edit" name="edit"></span>
        </div>
        <input name="id" id = "idedit"value="" style="display: none">
        <label for="">Hiển thị ở menu Web: </label>
        <select name="onmenu" style="border: solid 1px #117a8b; border-radius: 2px; width: 100px; color: #c69500">
            <option value="1">YES</option>
            <option value="0">NO</option>
        </select>
        <menu>
            <button class="btn btn-info" style="float: right">Thay đổi</button>
        </menu>
    </form>
</dialog>
<script>
    function edititem(clicked_id) {
        var edt =  xacnhan = document.getElementById('edittheloai');
        var id =  document.getElementById(clicked_id);
        var getidname = "name"+clicked_id;
        var getname = document.getElementById(getidname).textContent;
        document.getElementById('edit').textContent= getname;
        document.getElementById('idedit').value= clicked_id;
        edt.showModal();
        var andi = document.getElementById('cancel1');
        andi.addEventListener('click', function() {
            edt.close();
        });
    }
</script>