<div class="card-footer">
    <a href="index.php?act=addorder"><button type="submit" class="btn btn-primary" style="float:right;">Thêm đơn hàng mới</button></a>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Đơn hàng</h3>
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
                            <th>STT</th>
                            <th>Thông tin</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listorder as $order) {
                            extract($order);
                            $editpro = "index.php?act=editpro&id=" . $id;
                            $deletepro = "index.php?act=deletepro&id=" . $id;
                            if ($payment = 1) {
                                echo '     <tr>    
                    <td>' . $id . '</td>

                    <td>
                    ' . $name . '<br>
                    ' . $email . '<br>
                    ' . $note . '<br>
                    </td>

                    <td>Ngày giờ: ' . $date . '<br>
                        Số người: ' . $customers . '<br>
                    </td>

                    `<td>
                    Tổng tiền: ' . number_format($total, 0, ',', '.') . ' VNĐ<br>
                    </td>

                    `<td>Đang xử lí</td>
                  </tr>
                    ';
                            } else {
                                echo '     <tr>    
                    <td>' . $id . '</td>

                    <td>
                    ' . $name . '<br>
                    ' . $email . '<br>
                    ' . $note . '<br>
                    </td>

                    <td>
                    ' . $date . '<br>
                    ' . $customers . '<br>
                    </td>

                    <td>' . $total . '</td>
                    <td>Thanh toán online</td>
                    <td>
                      </td>
                  </tr>
                    ';
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <div class="card-body">
                </div>

            </div>
            <!-- /.card-body -->
        </div>