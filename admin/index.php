<?php
include "../model/pdo.php";
include "../model/categories.php";
include "../model/products.php";
include '../model/users.php';
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dev-Coffee</title>

  <?php include 'components/stylesheet.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'components/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <?php
          if (isset($_GET["act"])) {
            $act = $_GET["act"];
            switch ($act) {
              case "dashboard":
                include "dashboard.php";
                break;
                // Products
              case "listpro":
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                  $kyw = $_POST['kyw'];
                  $iddm = $_POST['categories_id'];
                } else {
                  $kyw = '';
                  $iddm = 0;
                }
                $list_categories = load_all_categories();
                $listproducts = load_all_products();
                include "modules/products/list.php";
                break;

              case "addpro":
                if (isset($_POST['addnew']) && ($_POST['addnew'])) {
                  $categories_id = $_POST['categories_id'];
                  $name = $_POST['name'];
                  $price = $_POST['price'];
                  $img = $_FILES['img']['name'];
                  $detail = $_POST['detail'];
                  $target_dir = "./uploads/";
                  $target_file = $target_dir . basename($_FILES["img"]["name"]);
                  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                  } else {
                  }
                  // insert_products($iddm, $tensp, $giasp, $hinh, $mota);
                  insert_products($categories_id, $name, $price, $img, $detail);
                  $thongbao = "Thêm thành công";
                }
                $list_categories = load_all_categories();
                include "modules/products/add.php";
                break;

                // case "editpro":
                //   if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                //     $products = load_one_products($_GET['id']);
                //   }
                //   $list_categories = load_all_categories();
                //   include "modules/products/edit.php";
                //   break;

              case 'editpro':
                if (isset($_POST['id']) && ($_POST['id'])) {
                  $listproducts = load_one_products($_GET['id']);
                }
                $list_categories = load_all_categories();
                include "modules/products/edit.php";
                break;
              case 'updatepro':
                if (isset($_POST['update']) && ($_POST['update'])) {
                  $id = $_POST['id'];
                  $categories_id = $_POST['categories_id'];
                  $name = $_POST['name'];
                  $price = $_POST['price'];
                  $img = $_FILES['img']['name'];
                  $detail = $_POST['detail'];
                  $target_dir = "./uploads/";
                  $target_file = $target_dir . basename($_FILES["img"]["name"]);
                  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                  } else {
                  }
                  update_products($id, $categories_id, $name, $price, $detail, $img);
                  $alert = "Cập nhật thành công";
                }
                $listproducts = load_all_products();
                include 'modules/products/list.php';
                break;
              case "deletepro":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                  delete_products($_GET['id']);
                }
                $listproducts = load_all_products();
                include "modules/products/list.php";
                break;
              case "storgepro":
                $listdeletedproducts = load_deleted_products();
                include "modules/products/storage.php";
                break;
              case 'restorepro':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                  restore_products($_GET['id']);
                }
                $listdeletedproducts = load_deleted_products();
                include "modules/products/storage.php";
                break;
                // Categories
              case "listcate":
                $listcategories = load_all_categories();
                include "modules/categories/list.php";
                break;
              case "addcate":
                include "modules/categories/add.php";
                break;
              case "editcate":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                  $cate = load_one_categories($_GET['id']);
                }
                include "modules/categories/edit.php";
                break;
              case 'updatecate':
                if (isset($_POST['update']) && ($_POST['update'])) {
                  $name = $_POST['name'];
                  $id = $_POST['id'];
                  update_categories($id, $name);
                  $alert = "Cập nhật thành công!";
                }
                $listcategories = load_all_categories();
                include 'modules/categories/list.php';
                break;
              case 'deletecate':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                  delete_categories($_GET['id']);
                }
                $listcategories = load_all_categories();
                include 'modules/categories/list.php';
                break;
              case 'storagecate':
                $listdeletedcategories = load_deleted_categories();
                include "modules/categories/storage.php";
                break;
              case 'restorecate':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                  restore_categories($_GET['id']);
                }
                $listdeletedcategories = load_deleted_categories();
                include "modules/categories/storage.php";
                break;
                // User
              case "listuser":
                $listuser = loadall_user();
                include "modules/user/list.php";
                break;
              case "deletetuser":
                if (isset($_GET['id']) && ($_GET['id'])) {
                  delete_user($_GET['id']);
                }
                $listuser = loadall_user();
                include "modules/user/list.php";
                break;
                // Order
              case "listorder":
                include "modules/orders/list.php";
                break;
              case "addorder":
                include "modules/orders/add.php";
                break;
              case "editorder":
                include "modules/orders/edit.php";
                break;

              case 'thongke':
                $listthongke = load_all_thongke();
                include "modules/thongke/list.php";
                break;

              case 'bieudo':
                $listthongke = load_all_thongke();
                include "modules/thongke/bieudo.php";
                break;
            }
          } else {
            include "dashboard.php";
          }
          ?>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'components/footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <?php include 'components/script.php'; ?>
</body>

</html>