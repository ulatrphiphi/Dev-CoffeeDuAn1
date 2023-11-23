<div class="card-footer">
  <a href="index.php?act=addcate"><button type="submit" class="btn btn-primary" style="float:right;">Thêm Danh Mục</button></a>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Danh mục</h3>
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
              <th>Tên Danh mục</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($listcategories as $category) {
              extract($category);
              $editcate = "index.php?act=editcate&id=" . $id;
              $deletecate = "index.php?act=deletecate&id=" . $id;
              echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>
                      <a href="'.$editcate.'" class="btn btn-primary">Sửa</a>
                      <a href="'.$deletecate.'" class="btn btn-danger">Xóa</a>
                    </td>
                  </tr>
                    ';
            }
            ?>
          </tbody>
        </table>


      </div>
      <div class="card-footer">
  <a href="index.php?act=storagecate"><button type="submit" class="btn btn-danger" style="float:right;">Xem danh mục đã xóa</button></a>
</div>

    </div>