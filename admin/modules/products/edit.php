

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Sửa sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" value="<?= $data['name'] ?? '' ?>" class="form-control" id="name" required name="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="thumbnail">Ảnh</label>
                <input type="file" value="<?= $data['thumbnail'] ?? '' ?>" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung</label>
                <textarea class="form-control" required id="summernote" name="content"><?= $data['content'] ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá gốc</label>
                <input type="number" value="<?= $data['price'] ?? '' ?>" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="sale_price">Giá đã giảm</label>
                <input type="text" class="form-control" value="<?= $data['sale_price'] ?? '' ?>" id="sale_price" required name="sale_price">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
    </form>
</div>