<div class="card-footer"><a href="index.php?act=listcate"><button type="submit" class="btn btn-primary" style="float:left;">Danh sách danh mục</button></a></div>

<div class="card card-primary">
<div class="card-header">
        <h3 class="card-title"> Thêm Danh mục</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="index.php?act=addcate" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Mã Danh Mục</label>
                <input type="text" class="form-control" id="" name="id" placeholder="Mã Danh Mục Tự Động Tăng" disabled>
            </div>
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="" name="name" placeholder="Nhập tên danh mục">
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    echo "<span style='color:red;'>Vui lòng nhập tên danh mục</span>";
                } else {
                    $name = $_POST["name"];
                    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                        echo "<span style='color:red;'>Tên danh mục chỉ chấp nhận chữ và khoảng trắng.</span>";
                    } else {
                        $name = $_POST['name'];
                        insert_categories($name);
                        $alert = '<p style="color:red;">Thêm thành công!</p>';
                        if (isset($alert) && ($alert != "")) echo $alert;
                    }
                }
            }

            ?>
            <!-- <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="name" required name="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="thumbnail">Ảnh</label>
                <input type="file" required class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung</label>
                <textarea class="form-control" required id="summernote" name="content"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá gốc</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="sale_price">Giá đã giảm</label>
                <input type="number" class="form-control" id="sale_price" required name="sale_price">
            </div> -->
            <div class="card-footer">
                <input type="submit" name="addnew" class="btn btn-primary" value="Thêm Danh Mục">
            </div>

    </form>
</div>