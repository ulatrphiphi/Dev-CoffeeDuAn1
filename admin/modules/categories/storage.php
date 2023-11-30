<div class="card-footer">
  <a href="index.php?act=listcate&page=1"><button type="submit" class="btn btn-primary" style="float:left;">Danh sách danh Mục</button></a>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Danh mục đã xóa</h3>
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
            foreach ($listdeletedcategories as $category) {
              extract($category);
              $restorecate = "index.php?act=restorecate&id=" . $id;
             
              echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>
                      <a href="'.$restorecate.'" class="btn btn-primary">Khôi phục danh mục</a>
                   
                    </td>
                  </tr>
                    ';
            }
            ?>
          </tbody>
        </table>

        <div class="card-body">
        </div>

      </div>
      <!-- /.card-body -->
    </div>