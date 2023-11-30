<div class="card-footer">
  <a href="index.php?act=listpro&page=1"><button type="submit" class="btn btn-primary" style="float:left;">Danh sách sản phẩm</button></a>
</div>
<?php
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sản Phẩm</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm Kiếm">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">

        <table class="table table-head-fixed text-nowrap table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên sản phẩm</th>
              <th>Ảnh sản phẩm</th>
              <th>Giá sản phẩm</th>
              <th>Mô tả</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($listdeletedproducts as $products) {
              extract($products);

              $restorepro = "index.php?act=restorepro&id=" . $id;
              $imgpath = "./uploads/" . $img;
              if (is_file($imgpath)) {
                $img = "<img src='" . $imgpath . "' height='50'>";
              } else {
                $img = "Không có ảnh";
              }
              echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $img . '</td>
                    <td><strong>' . number_format($price, 0, ',', '.') . ' VNĐ</strong></td>
                    <td>'.$detail.'</td>
                    <td>
                      <a href="' . $restorepro . '" class="btn btn-primary">Khôi phục</a>
                      </td>
                  </tr>
                    ';
            }
            ?>
            <!-- <tr>    
                  <td></td>
                  <td></td>
                  <td>
                    <a href="index.php?act=editsp" class="btn btn-primary">Sửa</a>
                    <a href="#" class="btn btn-danger">Xóa</a>
                  </td>
                </tr> -->
          </tbody>
        </table>

        <div class="card-body">
        </div>

      </div>
      <!-- /.card-body -->
    </div>