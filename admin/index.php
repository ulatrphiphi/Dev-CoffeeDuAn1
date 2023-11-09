<?php
session_start();
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
              case "listsp":
                include "modules/products/list.php";
                break;
              case "addsp":
                include "modules/products/add.php";
                break;
              case "editsp":
                include "modules/products/edit.php";
                break;
             

                //       case "list":
                //         include "modules/products/list.php";
                //         break;
                //       case "add":
                //         include "modules/products/add.php";
                //         break;
                //       case "edit":
                //         include "modules/products/edit.php";
                //         break;

                //       default:
                //         include "modules/products/list.php";
                //         break;
                //     }
                //     break;
                //   case "posts":
                //     switch ($_GET["action"]) {
                //       case "list":
                //         include "modules/posts/list.php";
                //         break;
                //       case "add":
                //         include "modules/posts/add.php";
                //         break;
                //       case "edit":
                //         include "modules/posts/edit.php";
                //         break;

                //       default:
                //         include "modules/posts/list.php";
                //         break;
                //     }
                //     break;
                //   case "orders":
                //     switch ($_GET["action"]) {
                //       case "list":
                //         include "modules/orders/list.php";
                //         break;
                //       case "add":
                //         include "modules/orders/add.php";
                //         break;
                //       case "edit":
                //         include "modules/orders/edit.php";
                //         break;

                //       default:
                //         include "modules/orders/list.php";
                //         break;
                //     }
                //     break;
                //   case "users":
                //     switch ($_GET["action"]) {
                //       case "list":
                //         include "modules/users/list.php";
                //         break;
                //       case "add":
                //         include "modules/users/add.php";
                //         break;
                //       case "edit":
                //         include "modules/users/edit.php";
                //         break;
                //     }
                //   default:
                //     include "dashboard.php";
                //     break;
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