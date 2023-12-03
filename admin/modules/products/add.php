<?php
$error = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Bắt lỗi tên sản phẩm
    if (empty($_POST["name"])) {
        $error['name']['required'] = "Vui lòng nhập tên sản phẩm";
    }

    // Bắt lỗi giá sản phẩm
    if (empty($_POST["price"])) {
        $error['price']['required'] = "Vui lòng nhập giá sản phẩm";
    } else {
        $price = $_POST["price"];
        // Kiểm tra xem giá sản phẩm chỉ chứa số
        if (!is_numeric($price)) {
            $error['price']['invalid'] = "Giá sản phẩm chỉ có thể chứa số";
        }
    }

    // Bắt lỗi ảnh sản phẩm
    if (empty($_FILES['img']['name'])) {
        $error['img']['required'] = "Vui lòng chọn ảnh sản phẩm";
    } else {
        $img = $_FILES['img']['name'];

        // Get the file extension
        $imgExtension = strtolower(pathinfo($img, PATHINFO_EXTENSION));

        // Allowed image extensions
        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        // Check if the extension is in the allowed list
        if (!in_array($imgExtension, $allowedExtensions)) {
            $error['img']['format'] = "Chỉ chấp nhận ảnh có định dạng jpg, jpeg, hoặc png";
        }
    }

    // Nếu không có lỗi, tiếp tục xử lý hoặc thêm vào CSDL
    if (empty($error)) {
        $name = $_POST["name"];
        // Xử lý hoặc thêm vào CSDL
        insert_products($categories_id, $name, $price, $img, $detail);
        $success = "Thêm sản phẩm thành công!";
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
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label>Danh mục</label>
                <select name="categories_id" id="" class="form-control">
                    <?php foreach ($list_categories as $categories) {
                        extract($categories);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                <?php echo !empty($error['name']['required']) ? '<p style="color: red;">' . $error['name']['required'] . '</p>' : ''; ?>
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                <?php echo !empty($error['price']['required']) ? '<p style="color: red;">' . $error['price']['required'] . '</p>' : ''; ?>
                <?php echo !empty($error['price']['invalid']) ? '<p style="color: red;">' . $error['price']['invalid'] . '</p>' : ''; ?>
            </div>
            <div class="form-group">
                <label for="img">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="img" placeholder="Nhập ảnh sản phẩm">
                <?php echo !empty($error['img']['required']) ? '<p style="color: red;">' . $error['img']['required'] . '</p>' : ''; ?>
                <?php echo !empty($error['img']['format']) ? '<p style="color: red;">' . $error['img']['format'] . '</p>' : ''; ?>
            </div>
            <div class="form-group">
                <label for="detail">Mô tả sản phẩm</label>
                <textarea class="form-control" id="summernote" name="detail"></textarea>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" name="addnew" value="Thêm mới">
                <input type="reset" class="btn btn-primary" value="Nhập lại">
            </div>
        </div>
    </form>
</div>