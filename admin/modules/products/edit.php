<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$products = load_one_products($id);

if (is_array($products)) {
    extract($products);
    // Các biến như $id, $name, $price, $img, $detail đã được khai báo
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" .  $hinhpath . "' height='80'";
} else {
    $hinh = "no photo";
}
?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Sửa sản phẩm</h3>
    </div>


    <form action="index.php?act=editpro" method="POST" enctype="multipart/form-data">
            <div class="cart body">
                <br>
                <select name="iddm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php foreach ($list_categories as $categories) {
                        extract($categories);
                        if ($iddm == $id) $s = "selected";
                        else $s = "";
                        echo '<option value="' . $id . '" ' . $s . '>' . $name . '</option>';
                    } ?>

                </select>
            </div>
            <div class="form-group">
                Tên sản phẩm <br>
                <input type="text" name="tensp" id="" value="<?= $products['name'] ?>">
            </div>
            <div class="form-group">
                Giá <br>
                <input type="text" name="giasp" value="<?= $products['price'] ?>">
            </div>
            <div class="form-group">
                Hình ảnh <br>
                <input type="file" name="hinh">
                <?= $hinh ?>
            </div>
            <div class="form-group">
                Mô tả <br>
                <textarea class="form-control" id="summernote" name="mota"><?= $products['detail'] ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $products['id'] ?>">
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listpro"><input type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
</div>