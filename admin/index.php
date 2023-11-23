<?php
include "../model/pdo.php";
include "../model/categories.php";
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
                include "modules/products/list.php";
                break;
              case "addpro":
                include "modules/products/add.php";
                break;
              case "editpro":
                include "modules/products/edit.php";
                break;
                // Categories
              case "listcate":
                $listcategories = load_all_categories();
                include "modules/categories/list.php";
                break;
              case "addcate":
                if (isset($_POST['addnew']) && ($_POST['addnew'])) {
                  $name = $_POST['name'];
                  insert_categories($name);
                  $alert = '<p style="color:red;">Thêm thành công!</p>';
                }
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
                // User
              case "listuser":
                include "modules/users/list.php";
                break;
              case "adduser":
                include "modules/users/add.php";
                break;
              case "edituser":
                include "modules/users/edit.php";
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