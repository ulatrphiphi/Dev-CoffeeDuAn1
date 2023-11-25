<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$products = load_one_products($id);

if (is_array($products)) {
    extract($products);
    // Các biến như $id, $name, $price, $img, $detail đã được khai báo
}
$img_path = "./uploads/" . $img;
if (is_file($img_path)) {
    $img = "<img src='" .  $img_path . "' height='80'";
} else {
    $img = "no photo";
}
?>
<div class="card-footer"><a href="index.php?act=listpro"><button type="submit" class="btn btn-primary" style="float:left;">Danh sách sản phẩm</button></a></div>
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
               <select name="categories_id" class="form-control" id="">
                            <?php foreach ($list_categories as $categories) {
                                extract($categories);
                                echo'<option value="'.$id.'">'.$name.'</option>';

                            }?>
                            
                        </select>
            </div>
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="<?=$products['name']?>">
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" value="<?=$products['price']?>">
            </div>
            <div class="">
                <label for="img">Ảnh sản phẩm</label>
                <input type="file" class="" name="img">
                <?=$img?>
            </div>
            <div class="form-group">
                <label for="detail">Mô tả sản phẩm</label>
                <textarea class="form-control" id="summernote" name="detail" ><?=$products['detail']?></textarea>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" name="addnew" value="Thêm mới">
                <input type="reset" class="btn btn-primary" value="Nhập lại">
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
    </form>
</div>