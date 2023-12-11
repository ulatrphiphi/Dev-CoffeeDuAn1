<?php 
 if(is_array($cate)){
    extract($cate);
 }
?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Chỉnh sửa danh mục</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="index.php?act=updatecate" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Mã Danh Mục</label>
                <input type="text" class="form-control" id="" name="id" placeholder="Mã Danh Mục Tự Động Tăng" disabled>
            </div>
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="" name="name" value="<?php if(isset($name)&&($name!=""))  echo $name;?>">
            </div>
            <?php
            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     if (empty($_POST["name"])) {
            //         echo "<span style='color:red;'>Vui lòng nhập tên danh mục</span>";
            //     } else {
            //         $name = $_POST["name"];
            //         if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
            //             echo "<span style='color:red;'>Tên danh mục chỉ chấp nhận chữ và khoảng trắng.</span>";
            //         } else {
            //             echo $name;
            //             if(isset($alert)&&($alert!="")) echo $alert;
            //         }
            //     }
            // }
        
            ?>
            <div class="card-footer">
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0))  echo $id;?>">
                <input type="submit" name="update" class="btn btn-primary" value="Sửa Danh Mục">
</div>
            
    </form>
</div>