
<div class="card-footer">
  <a href="/admin/?pages=posts&action=add"><button type="submit" class="btn btn-primary" style="float:right;">Thêm Bài Viết</button></a>
</div>


<div class="card">
  <div class="card-header">
    lọc sản phẩm
  </div> 
  <div class="card-body">
 
      <form action="/admin/index.php" class="form-inline" method="GET">
        <input type="hidden" name="pages" value="posts">
        <input type="hidden" name="action" value="list">
        <select name="category" id="category" class="form-control mr-3">
         
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
        <h3 class="card-title">Tin tức</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
       
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tiêu đề sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Ngày đăng</th>
                <th>Hành động </th>
              </tr>
            </thead>
            <tbody>
            
             
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="index.php?act=editsp" class="btn btn-primary">Sửa</a>
                    <a href="#" class="btn btn-danger">Xóa</a>
                  </td>
                 
                </tr>
           
            </tbody>
          </table>
      
          <div class="card-body">
            <p>Đang cập nhật dữ liệu</p>
          </div>
        
      </div>
      <!-- /.card-body -->
    </div>

