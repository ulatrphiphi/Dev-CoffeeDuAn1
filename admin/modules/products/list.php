<?php
// Truy vấn sử dụng PDO
$pdo = pdo_get_connection();

$stmt = $pdo->query("select * from products where status = 1 order by id desc");
$listproducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Tổng các bảng ghi
$total = count($listproducts);

//Giới hạn hiển thị
$limit = 5;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;

// Hàm để lấy danh sách sản phẩm với giới hạn
$list_products_limit = get_products_limit($start, $limit);


if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listproducts = $list_products_limit;
}

?>

<div class="card-footer">
    <a href="index.php?act=addpro"><button type="submit" class="btn btn-primary" style="float:right;">Thêm sản phẩm</button></a>
</div>
<?php
?>
<div class="card">
    <div class="card-header">
        lọc sản phẩm
    </div>
    <div class="card-body">

        <form action="/admin/index.php" class="form-inline" method="GET">
            <input type="hidden" name="pages" value="posts">
            <input type="hidden" name="action" value="list">
            <select name="categories" id="categories" class="form-control mr-3">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($list_categories as $categories) {
                    extract($categories);
                    echo '<option value=' . $id . '>' . $name . '</option>';
                }
                ?>
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
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listproducts as $products) {
                            extract($products);

                            $editpro = "index.php?act=editpro&id=" . $id;
                            $deletepro = "index.php?act=deletepro&id=" . $id;
                            $imgpath = "./uploads/" . $img;
                            if (is_file($imgpath)) {
                                $img = "<img src='" . $imgpath . "' height='50'>";
                            } else {
                                $img = "Không có ảnh";
                            }
                            echo '     <tr>    
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $img . '</td>
                    <td><strong>' . number_format($price, 0, ',', '.') . ' VNĐ</strong></td>
                    <td>' . substr($detail, 0, 1000) . '...</td>
                    <td>
                      <a href="' . $editpro . '" class="btn btn-primary">Sửa</a>
                      <a href="' . $deletepro . '"><input type="button" class="btn btn-danger" value="Xóa"></a>
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
        <div class="card-footer">
            <a href="index.php?act=storgepro"><button type="submit" class="btn btn-danger" style="float:right;">Xem sản phẩm đã xóa</button></a>
        </div>


        <!-- Phân trang  -->
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
        </div>