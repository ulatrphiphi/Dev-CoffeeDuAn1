<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dev Coffee</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/png" href="/view/images/logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" />

  <link rel="stylesheet" href="/view/css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="/view/css/animate.css" />

  <link rel="stylesheet" href="/view/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="/view/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="/view/css/magnific-popup.css" />

  <link rel="stylesheet" href="/view/css/aos.css" />

  <link rel="stylesheet" href="/view/css/ionicons.min.css" />

  <link rel="stylesheet" href="/view/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="/view/css/jquery.timepicker.css" />

  <link rel="stylesheet" href="/view/css/flaticon.css" />
  <link rel="stylesheet" href="/view/css/icomoon.css" />
  <link rel="stylesheet" href="/view/css/style.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="/view/images/logo.png" width="90px" alt="" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a href="index.php?act=menu" class="nav-link">Menu</a>
          </li>
          <li class="nav-item">
            <a href="index.php?act=services" class="nav-link">Dịch vụ</a>
          </li>
          <!-- <li class="nav-item">
              <a href="index.php?act=blog" class="nav-link">Bài Viết</a>
            </li> -->
          <li class="nav-item">
            <a href="index.php?act=about" class="nav-link">Về chúng tôi</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="/view/shop.html">Shop</a>
              <a class="dropdown-item" href="/view/product-single.html">Single Product</a>
              <a class="dropdown-item" href="/view/room.html">Cart</a>
              <a class="dropdown-item" href="/view/checkout.html">Checkout</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="index.php?act=contact" class="nav-link">Liên hệ</a>
          </li>
          <li class="nav-item cart">
            <a href="index.php?act=cart" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a>
          </li>
        </ul>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if (isset($_SESSION['user_id'])) {
              $user = getUser();
              $role = getRole();
            ?>

              <span class="icon icon-user"></span>
              <?= 'Xin chào ' . $user['user']?><span class="text-header"></span>
          </a>

          <ul class="dropdown-menu">
            <!-- <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
              <li><a class="dropdown-item" href="#">Đơn hàng của bạn</a></li> -->
            <li><a class="dropdown-item" href="index.php?act=edit_user">Chỉnh Sửa Tài Khoản</a></li>
            <li><a class="dropdown-item" href="index.php?act=order_user">Đơn Hàng của Tôi</a></li>
            <?php

              if ($role['role'] == 1) {
            ?>
              <li><a class="dropdown-item" href="/admin/index.php">Đăng nhập Admin</a></li> <?php } ?>
            <li><a class="dropdown-item" href="index.php?act=logout">Đăng Xuất</a></li>
          </ul>
        <? } else { ?>
          <span class="icon icon-user"></span>
          <span class="text-header"></span>
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?act=login">Đăng nhập</a></li>
            <li><a class="dropdown-item" href="index.php?act=signup">Đăng ký</a></li>

          </ul>

        </div>
      <? } ?>
      </div>
    </div>
  </nav>
  <!-- END nav -->