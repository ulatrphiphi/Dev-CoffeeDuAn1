<div class="card-footer">
<a href="index.php?act=listuser"><button type="submit" class="btn btn-primary" style="float:left;">Danh sách tài khoản</button></a>
</div>
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
            foreach ($listdeleteuser as $user) {
              extract($user);
              $restoreuser = "index.php?act=restoreuser&id=" . $id;
              if ($role == 1) {

                echo '<tr>
            <td>' . $id . '</td>
            <td>' . $user . '</td>
            <td>' . $email . '</td>
            <td>' . $address . '</td>
            <td>' . $tel . '</td>
            <td>Admin</td>
            <td>
            <a class="btn btn-primary" href="' . $restoreuser . '">Khôi phục tài khoản</a>
            </td>
          </tr>';
              } else {


                echo '<tr>
                    <td>' . $id . '</td>
                    <td>' . $user . '</td>
                    <td>' . $email . '</td>
                    <td>' . $address . '</td>
                    <td>' . $tel . '</td>
                    <td>Người Dùng</td>
                    <td>
                    <a class="btn btn-primary" href="' . $restoreuser . '">Khôi phục tài khoản</a>
                    </td>
                  </tr>';
              }
            }
            ?>
          </tbody>
        </table>

      </div>
      <!-- /.card-body -->
    </div>