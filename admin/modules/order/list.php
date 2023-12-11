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
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listorder as $order) {
                            extract($order);
                            $editorder = "index.php?act=editorder&id=" . $id;
                            if ($status == 1) {
                                echo '<tr>    
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $date . '</td>
                                    <td>' . $customers . '</td>
                                    <td>' . $note . '</td>
                                    <td>Đang xử lý</td>
                                    <td><a class="btn btn-primary" href="' . $editorder . '">Đổi trạng thái</a></td>
                                </tr>';
                            } else if ($status == 2) {
                                echo '<tr>    
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $date . '</td>
                                    <td>' . $customers . '</td>
                                    <td>' . $note . '</td> 
                                    <td>Đã thanh toán</td>
                                    <td><a class="btn btn-primary" href="' . $editorder . '">Đổi trạng thái</a></td>
                                </tr>';
                            } else {
                                echo '<tr>    
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $date . '</td>
                                <td>' . $customers . '</td>
                                <td>' . $note . '</td>
                                <td>Đã hủy</td>
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