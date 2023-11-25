<div class="card-footer">
  <a href="index.php?act=addpro"><button type="submit" class="btn btn-primary" style="float:right;">Thêm sản phẩm</button></a>
</div>
<?php
?>
<div class="card">
  <div class="card-header">
    lọc sản phẩm
  </div>
  <div class="card-body">

    <form action="/admin/index.php" class="form-inline" method="GET">
      <input type="hidden" name="pages" value="posts">
      <input type="hidden" name="action" value="list">
      <select name="categories" id="categories" class="form-control mr-3">
      <option value="0" selected>Tất cả</option>
      <?php
      foreach ($list_categories as $categories) {
        extract($categories);
        echo '<option value=' . $id . '>' . $name . '</option>';
      }
      ?>
      </select>
      <button type="submit" class="btn btn-primary">
        Lọc dữ liệu
      </button>
    </form>

  </div>
</div>

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
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($listproducts as $products) {
              extract($products);

              $suasp = "index.php?act=editpro&id=" . $id;
              $xoasp = "index.php?act=delpro&id=" . $id;
              $hinhpath = "../upload/" . $img;
              if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='80'>";
              } else {
                $hinh = "no photo";
              }
              echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $hinh . '</td>
                    <td><strong>' . number_format($price, 0, ',', '.') . ' VNĐ</strong></td>
                    <td>
                      <a href="' . $suasp . '" class="btn btn-primary">Sửa</a>
                      <a href="' . $xoasp . '"><input type="button" class="btn btn-danger" value="Xóa"></a>
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