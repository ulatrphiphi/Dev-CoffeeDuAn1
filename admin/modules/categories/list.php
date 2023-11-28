<?php
// Truy vấn sử dụng PDO
$pdo = pdo_get_connection();

$stmt = $pdo->query("select * from categories where status = 1 order by id desc");
$list_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Tổng các bảng ghi
$total = count($list_categories);

//Giới hạn hiển thị
$limit = 5;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;

// Hàm để lấy danh sách sản phẩm với giới hạn
$list_categories_limit = get_categories_limit($start, $limit);


if (isset($_GET['page']) && !empty($_GET['page'])) {
    $list_categories = $list_categories_limit;
}

?>

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
                        foreach ($list_categories as $category) {
                            extract($category);
                            $editcate = "index.php?act=editcate&id=" . $id;
                            $deletecate = "index.php?act=deletecate&id=" . $id;
                            echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>
                      <a href="' . $editcate . '" class="btn btn-primary">Sửa</a>
                      <a href="' . $deletecate . '" class="btn btn-danger">Xóa</a>
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


        <!-- Phân trang  -->
        <div class="pag float-end">
            <nav aria-label="Page navigation example" class="pag">
                <ul class="pagination">
                    <?php if ($cr_page > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?act=listcate&page=<?= $cr_page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                        <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>">
                            <a class="page-link" href="index.php?act=listcate&page=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($cr_page < $total_page) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?act=listcate&page=<?= $cr_page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>