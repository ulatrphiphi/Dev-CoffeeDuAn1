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
                            <th>STT</th>
                            <th>Thông tin</th>
                            <th>Ngày đặt</th>
                            <th>Số người</th>
                            <th>Ghi chú</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listorder as $order) {
                            extract($order);
                            $editorder = "index.php?act=editorder&id=" . $id;
                            if ($payment = 1) {
                                echo '     <tr>    
            <td>' . $id . '</td>
            <td>' . $name . '<br></td>
            <td>' . $date . '</td>
            <td>' . $customers . '<br></td>
            <td>' . $note . '</td>
            <td>' . number_format($total, 0, ',', '.') . ' VNĐ<br></td>
            <td>';

                                if ($status == 1) {
                                    echo 'Đang xử lý';
                                } elseif ($status == 2) {
                                    echo 'Đang giao hàng';
                                } else {
                                    echo $status;
                                }

                                echo '</td>
            <td><a class="btn btn-primary" href="' . $editorder . '">Đổi trạng thái</a></td>
        </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>