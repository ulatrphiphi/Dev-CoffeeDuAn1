<?php
            $error =[];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $error['name']['required'] = "Vui lòng nhập tên sản phẩm"; 
                } else {
                    $name = $_POST["name"];
                    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                        $error['name']['invaild'] = "Tên sản phẩm chỉ có chữ và khoảng trắng";
                    } else {
                        $name = $_POST['name'];
                        insert_products($categories_id, $name, $price, $img, $detail);
                        $alert = '<p style="color:red;">Thêm thành công!</p>';
                        if (isset($alert) && ($alert != "")) echo $alert;
                    }
                }

                if(empty($_POST["price"])){
                    $error['price']['required'] = "Vui lòng nhập giá sản phẩm";
                }else{
                    $price = $_POST["price"];
                    if (!preg_match("/^[a-zA-Z ]*$/", $price)) {
                        $error['price']['invaild'] = "Giá sản phẩm chỉ có số";
                    } else {
                        $price = $_POST['price'];
                        insert_products($categories_id, $name, $price, $img, $detail);
                        $alert = '<p style="color:red;">Thêm thành công!</p>';
                        if (isset($alert) && ($alert != "")) echo $alert;
                    }
                }
            }

            ?>
<div class="card-footer"><a href="index.php?act=listpro&page=1"><button type="submit" class="btn btn-primary" style="float:left;">Danh sách sản phẩm</button></a></div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Thêm sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="index.php?act=addpro" method="POST" enctype="multipart/form-data">
        <div class="card-body">


            <div class="form-group">
               <label>Danh mục</label>
               <select name="categories_id" id="" class="form-control">
                            <?php foreach ($list_categories as $categories) {
                                extract($categories);
                                echo'<option value="'.$id.'">'.$name.'</option>';

                            }?>
                            
                        </select>
            </div>
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
            </div>
            <?php echo !empty($error['name']['required']) ? '<p style="color: red;">' . $error['name']['required'] : '';
                        '</p>' ?>
                        <!-- Bắt lỗi sai định dạng -->
            <?php echo !empty($error['name']['invaild']) ? '<p style="color: red;">' . $error['name']['invaild'] : '';
                        '</p>' ?>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
            </div>
            <?php echo !empty($error['price']['required']) ? '<p style="color: red;">' . $error['price']['required'] : '';
                        '</p>' ?>
                        <!-- Bắt lỗi sai định dạng -->
            <?php echo !empty($error['price']['invaild']) ? '<p style="color: red;">' . $error['price']['invaild'] : '';
                        '</p>' ?>
            <div class="form-group">
                <label for="img">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="img" placeholder="Nhập ảnh sản phẩm">
            </div>
            <div class="form-group">
                <label for="detail">Mô tả sản phẩm</label>
                <textarea class="form-control" id="summernote" name="detail"></textarea>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" name="addnew" value="Thêm mới">
                <input type="reset" class="btn btn-primary" value="Nhập lại">
            </div>
    </form>
</div>