


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Thêm sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
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
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </div>
    </form>
</div>