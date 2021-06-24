<?php
if(isset($_GET['add'])){
    $theloai=$_GET['add'];
    $sql ="INSERT INTO theloai values(NULL,'$theloai',0)";
    echo $sql;
    mysqli_query($conn, $sql);
    echo '<script>window.location="'.$domain.'/admin/?chucnang=theloai";</script>';
}
if(isset($_GET['dele'])){
    $id = $_GET['dele'];
    if($id === '0'){
        echo '<script>alert("Bạn không thể xóa mục này")</script>';
    }else{
        $getidtheloai = $_GET['dele'];
        $check = mysqli_num_rows(mysqli_query($conn,"SELECT id from list_video where id_theloai = $getidtheloai"));
        if($check > 0)     echo '<script>alert("Bạn không thể xóa vì vẫn còn video thuộc thể loại này")</script>';
        else mysqli_query($conn, "delete from theloai where id = $id");
    }
    echo '<script>window.location="'.$domain.'/admin/?chucnang=theloai";</script>';
}
if(isset($_GET['edit'])){
    $id = $_GET['id'];
    $name = $_GET['edit'];
    $getonmenu = $_GET['onmenu'];
    if($id === '0'){
        echo '<script>alert("Mục này không thể chỉnh sửa")</script>';
    }else{
        mysqli_query($conn, "UPDATE theloai set tentheloai = '$name', onmenu = $getonmenu where id = $id");
    }
   echo '<script>window.location="'.$domain.'/admin/?chucnang=theloai";</script>';
}
?>
<div style="background: #0056b3; height: 33px; color: #f2f2f2; font-size: 18px; padding-left: 10px; line-height: 33px; ">
    <i class="fab fa-pied-piper-square"></i>
    Quản lý thể loại
</div>
<br>
<table style="width: 100%; margin: 5px;">
    <tr style="font-weight: 600; color: #000; font-size: 18px;">
        <td colspan="4" style="text-align: left">
            <i class="fas fa-bars" style="margin-right: 3px;"></i>
            Danh sách thể loại</td>
    </tr>
    <tr style="background: #fff">
        <td style="color: #115095; font-weight: 500">Tên thể loại</td>
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
                        <button onClick="deleteitemn(this.id)" class="btn-dele backgroundbutton"  id="'.$getdata['id'].'">Xóa</button>
                        <button  onClick="edititem(this.id)" id="'.$getdata['id'].'" class="btn-edit backgroundbutton">Chỉnh sửa</button>
                </td>
            </tr>';
            }
            ?>
            <div style="display: none" id="num-rows"><?php echo $dem ?></div>
            <script>
                var n=(parseInt(document.getElementById('num-rows').textContent));

            </script>
    <?php
        }
    ?>
    <tr>
        <td colspan="4">
            <button id="addtheloai" style="font-weight: 600; color: #FF7610; font-size: 18px; border: none;">
                <i class="fas fa-plus-square"></i>
                Thêm thể loại mới</td>
            </button>
    </tr>
</table>

<dialog id="favDialog" style="border: none; width: 500px; text-align: center; box-shadow: 0px 0px 5px 5px #666; border-radius: 5px">
    <div style="position: absolute; top:0px; right: 0px; border: 0px; color: #c00;cursor: default; width: 25px; height: 25px; text-align: center; line-height: 25px;" id="cancel">X</div>
    <h4 style="color: #FF7610; margin-bottom: 15px;">Thêm thể loại mới</h4>
    <form method="get">
        <input name="chucnang" value="theloai" style="display: none">
        <input required="" CLASS="form-control" placeholder="Nhập tên thể loại....." style="width: 100%; margin-bottom: 15px;" type="text" name="add">
        <menu>
            <button class="btn btn-info">Thêm mới</button>
        </menu>
    </form>
</dialog>
<dialog id="xacnhanxoa" style="border: none; width: 500px;  box-shadow: 0px 0px 5px 5px #666; border-radius: 5px">
    <p style="font-size: 18px;">Bạn có thực sự muốn xóa mục này!!</p>
    <hr>
    <button class="btn btn-danger" style="float: right; margin-left: 10px; padding: 5px;" id="huydelete">Hủy</button>
    <form style="float: right">
        <input name="chucnang" value="theloai" style="display: none">
        <input id = "dele" name="dele" value="" style="display: none">
        <button style="padding: 5px;" class="btn btn-primary" id="xacnhandelete">Xác nhận</button>
    </form>
</dialog>
<dialog id="edittheloai" style="border: none; width: 500px; box-shadow: 0px 0px 5px 5px #666; border-radius: 5px">
    <div style="position: absolute; top:0px; right: 0px; border: 0px; color: #c00;cursor: default; width: 25px; height: 25px; text-align: center; line-height: 25px;" id="cancel1">X</div>
    <h5 style="color: #333; margin-bottom: 15px;">Chỉnh sửa thể loại</h5>
    <hr>
    <form method="get">
        <input name="chucnang" value="theloai" style="display: none">
        <div class="form-group">
            <label for="">Tên thể loại</label>
            <input required="" CLASS="form-control" placeholder="Nhập tên thể loại....."  style="width: 100%; margin-bottom: 15px;" type="text" id="edit" name="edit">
        </div>
        <input name="id" id = "idedit"value="" style="display: none">
        <label for="">Hiển thị ở menu Web: </label>
        <select name="onmenu" style="border: solid 1px #117a8b; border-radius: 2px">
            <option value="1">YES</option>
            <option value="0">NO</option>
        </select>
        <menu>
            <button class="btn btn-info" style="float: right">Chỉnh sửa</button>
        </menu>
    </form>
</dialog>
<script>
    function deleteitemn(clicked_id)
    {
        var xacnhan = document.getElementById('xacnhanxoa');
        var id =  document.getElementById(clicked_id);
        var huydelete = document.getElementById('huydelete');
        var dele = document.getElementById('dele');
        dele.value = clicked_id;
        huydelete.addEventListener('click', function() {
            xacnhan.close();
        });
        xacnhan.showModal();
    }
    function edititem(clicked_id) {
            var edt =  xacnhan = document.getElementById('edittheloai');
            var id =  document.getElementById(clicked_id);
            var getidname = "name"+clicked_id;
            var getname = document.getElementById(getidname).textContent;
        document.getElementById('edit').value= getname;
        document.getElementById('idedit').value= clicked_id;
            edt.showModal();
        var andi = document.getElementById('cancel1');
        andi.addEventListener('click', function() {
            edt.close();
        });
    }
    (function() {
        var updateButton = document.getElementById('addtheloai');
        var favDialog = document.getElementById('favDialog');
        var andi = document.getElementById('cancel');
        andi.addEventListener('click', function() {
            favDialog.close();
        });
        updateButton.addEventListener('click', function() {
            favDialog.showModal();
        });
    })();
</script>