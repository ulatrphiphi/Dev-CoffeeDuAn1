<?php
// // Truy vấn sử dụng PDO
// $pdo = pdo_get_connection();

// $stmt = $pdo->query("select * from products where status = 1 order by id desc");
// $listproducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// //Tổng các bảng ghi
// $total = count($listproducts);

// //Giới hạn hiển thị
// $limit = 5;

// //Tổng trang
// $total_page = ceil($total / $limit);

// // Lấy trang hiện tại
// $cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

// $start = ($cr_page - 1) * $limit;

// // Hàm để lấy danh sách sản phẩm với giới hạn
// $list_products_limit = get_products_limit($start, $limit);


// if (isset($_GET['page']) && !empty($_GET['page'])) {
//     $listproducts = $list_products_limit;
// }

?>

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
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($listorder as $order) {
                            extract($order);
                            $editpro = "index.php?act=editpro&id=" . $id;
                            $deletepro = "index.php?act=deletepro&id=" . $id;
                            if($payment = 1){
                            echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>
                    ' . $name . '<br>
                    ' . $email . '<br>
                    ' . $note . '<br>
                    </td>
                    <td>Ngày giờ: '.$date.'<br>
                        Số người: '.$customers.'<br>
                        Tổng tiền: ' . number_format($total, 0, ',', '.') . ' VNĐ<br>
                    </td>
                    <td>Thanh toán trực tiếp</td>
                    <td>
                    <select name="" id="" class="btn btn-primary">
                    <option value="0" selected>Thanh toán trực tiếp</option>
                    <option value="1" selected>Thanh toán online</option>
                      <a href=""><input type="button" class="btn btn-danger" value="Xem"></a>
                      </td>
                  </tr>
                    ';
                        }else{
                            echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>
                    ' . $name . '<br>
                    ' . $email . '<br>
                    ' . $note . '<br>
                    </td>
                    <td>'.$total.'</td>
                    <td>Thanh toán online</td>
                    <td>
                      <a href=""><input class="btn btn-primary" value="Hành động"></a>
                      <a href=""><input type="button" class="btn btn-danger" value="Xem"></a>
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


        <!-- Phân trang 
        <div class="pag float-end">
            <nav aria-label="Page navigation example" class="pag">
                <ul class="pagination">
                    <?php if ($cr_page > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?act=listpro&page=<?= $cr_page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                        <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>">
                            <a class="page-link" href="index.php?act=listpro&page=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($cr_page < $total_page) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?act=listpro&page=<?= $cr_page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div> -->