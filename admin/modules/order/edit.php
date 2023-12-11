<?php $item =  $order;
if (isset($item)) { ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa Vai trò</h3>
        </div>
        <form action="index.php?act=updateorder" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Khách hàng: <?= $item['name'] ?></label>
                </div>
                <div class="form-group">
                    <label for="name">Trạng Thái</label>
                    <select name="status" class="form-control" id="">
                        <option class="d-none" value="<?= $item['status'] ?>"><?= $item['payment'] == 1 ? 'Đang xử lý' : 'Đã Thanh Toán' ?></option>
                        <option value="1">Đang Xử Lý</option>
                        <option value="2">Đã Thanh Toán</option>
                        <option value="3">Đã Hủy</option>
                    </select>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="submit" name="update" class="btn btn-primary" value="Cập Nhật">
                </div>

        </form>
    </div>
<?php } ?>