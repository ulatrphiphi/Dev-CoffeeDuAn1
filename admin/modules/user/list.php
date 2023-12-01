<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tài khoản</h3>
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

        <table class="table table-head-fixed text-nowrap table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên người dùng</th>
              <th>Email</th>
              <th>Địa chỉ</th>
              <th>Điện thoại</th>
              <th>Vai trò</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($listuser as $user) {
              extract($user);
              $deluser = "index.php?act=deletetuser&id=" . $id;
              $edituser = "index.php?act=edituser&id=" . $id;
              if($role == 1){
                echo '
                <tr>
                          <td>' . $id . '</td>
                          <td>' . $user . '</td>
                          <td>' . $email . '</td>
                          <td>' . $address . '</td>
                          <td>' . $tel . '</td>
                          <td>Admin</td>
                          <td>
      
                          <a class="btn btn-primary" href="' . $edituser . '">Đổi vai trò</a>
                          <a class="btn btn-danger" href="' . $deluser . '">Khóa tài khoản</a>
                          </td>
                        </tr>';
                  
              }else{
              echo '
          <tr>
                    <td>' . $id . '</td>
                    <td>' . $user . '</td>
                    <td>' . $email . '</td>
                    <td>' . $address . '</td>
                    <td>' . $tel . '</td>
                    <td>Người dùng</td>
                    <td>

                    <a class="btn btn-primary" href="' . $edituser . '">Đổi vai trò</a>
                    <a class="btn btn-danger" href="' . $deluser . '">Khóa tài khoản  </a>
                    </td>
                  </tr>';}
            }
            ?>
          </tbody>
        </table>

      </div>
      <!-- /.card-body -->
    </div>
    <a href="index.php?act=storageuser"><button type="submit" class="btn btn-danger" style="float:right;">Xem tài khoản đã khóa</button></a>