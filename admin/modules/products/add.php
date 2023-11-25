<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Thêm sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="index.php?act=addpro" method="POST" enctype="multipart/form-data">
        <div class="card-body">


            <div class="form-group card-body">
                Danh mục<br>
                <!-- <select name="iddm">
                    <?php
                    foreach ($list_categories as $categories) {
                        extract($categories);
                        echo '<option value=' . $id . '>' . $name . '</option>';
                    }
                    ?>
                </select> -->
                <form action="/admin/index.php" class="form-inline" method="GET">
                    <input type="hidden" name="pages" value="posts">
                    <input type="hidden" name="action" value="list">
                    <select name="categories" id="categories" class="form-control mr-3">
                        <?php
                        foreach ($list_categories as $categories) {
                            extract($categories);
                            echo '<option value=' . $id . '>' . $name . '</option>';
                        }
                        ?>
                    </select>
                </form>
            </div>
            <div class="form-group">
                Tên sản phẩm <br>
                <input type="text" name="tensp">
            </div>
            <div class="form-group">
                Giá sản phẩm <br>
                <input type="text" name="giasp">
            </div>
            <div class="form-group">
                Ảnh <br>
                <input type="file" name="hinh">
            </div>
            <div class="form-group">
                Mô tả<br>
                <textarea class="form-control" id="summernote" name="content"><?= $products['detail'] ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listpro"> <input type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
    </form>
</div>