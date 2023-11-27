
<?php
?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sản Phẩm</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">

        <table class="table table-head-fixed text-nowrap table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>TÊN DANH MỤC</th>
              <th>SỐ LƯỢNG</th>
              <th>GIÁ CAO NHẤT</th>
              <th>GIÁ THẤP NHẤT</th>
              <th>GIÁ TRUNG BÌNH</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($listthongke as $thongke) {
              extract($thongke);
              echo '
                  <tr>
                    <td>' . $madm . '</td>
                    <td>' . $tendm . '</td>
                    <td>' . $countsp . '</td>
                    <td><strong>' . number_format($maxprice, 0, ',', '.') . 'VNĐ</strong></td>
                    <td><strong>' . number_format($minprice, 0, ',', '.') . 'VNĐ</strong></td>
                    <td><strong>' . number_format($avgprice, 0, ',', '.') . 'VNĐ</strong></td>
                </tr>';
            }
            ?>
          </tbody>
        </table>

        <div class="card-body">
        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <div class="card-footer">
      <a href="index.php?act=bieudo"><button type="submit" class="btn btn-danger" style="float:right;">Xem biểu đồ</button></a>
    </div>