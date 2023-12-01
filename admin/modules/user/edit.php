
<?php $item = $user;
if (isset($item)) { ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa Vai trò</h3>
        </div>
        <form action="index.php?act=updateuser" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên tài khoản: <?= $item['user'] ?></label>
                </div>
                <div class="form-group">
                    <label for="name">Vai Trò</label>
                    <select name="role" class="form-control" id="">
                        <option class="d-none" value="<?= $item['role'] ?>"><?= $item['role'] == 1 ? 'Admin' : 'Người Dùng' ?></option>
                        <option value="0">Người Dùng</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="submit" name="update" class="btn btn-primary" value="Sửa Vai trò">
                </div>

        </form>
    </div>
<?php } ?>