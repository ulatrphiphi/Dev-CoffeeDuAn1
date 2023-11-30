<?php
if (!empty($_POST)) {
    $error = [];
    if (empty($_POST['email'])) {
        $error['email']['required'] = 'Email không được để trống';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email']['invaild'] = 'Email không đúng định dạng';
        }
    }

    // if (empty($_POST['cpass'])) {
    //     $error['cpass']['required'] = 'xác nhận mật khẩu';
    // }

    if (empty($_POST['user'])) {
        $error['user']['required'] = 'Tên đăng nhập không được để trống';
    } elseif (is_user_exists($_POST['user'])) {
        $signupError = 'Tài khoản đã tồn tại'; // Gán giá trị khi tài khoản đã tồn tại
    }

    // if (empty($_POST['pass'])) {
    //     $error['pass']['required'] = 'Mật khẩu không được để trống';
    // }
    if (empty($_POST['pass'])) {
        $error['pass']['required'] = 'Mật khẩu không được để trống';
    } elseif ($_POST['pass'] !== $_POST['cpass']) {
        $error['cpass']['mismatch'] = 'Xác nhận mật khẩu không khớp';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/view/images/logo.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/view/css/util.css">
    <link rel="stylesheet" type="text/css" href="/view/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <section class="home-slider  owl-carousel">
        <div class="limiter">
            <div class="container-login100 " style="background-image: url('/view/images/bg_2.jpg');">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="POST" action="index.php?act=signup">
                        <span class="login100-form-logo">
                            <a href="index.php"><img src="/view/images/logo.png" width="160px" alt=""></a>
                            <!-- <i class="zmdi zmdi-landscape"></i> -->
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
                            Đăng ký
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                            <input class="input100" type="text" name="user" placeholder="Tên đăng Nhập">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                        <?php echo !empty($error['user']['required']) ? '<p style="color: red;">' . $error['user']['required'] : '';
                        '</p>' ?>
                        <?php
                        // Hiển thị thông báo lỗi khi tài khoản đã tồn tại
                        echo !empty($signupError) ? '<p style="color: red;">' . $signupError . '</p>' : '';
                        ?>


                        <div class="wrap-input100 validate-input" data-validate="Enter email">
                            <input class="input100" type="text" name="email" placeholder="Email của bạn">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                        <?php echo !empty($error['email']['required']) ? '<p style="color: red;">' . $error['email']['required'] : '';
                        '</p>' ?>
                        <?php echo !empty($error['email']['invaild']) ? '<p style="color: red;">' . $error['email']['invaild'] : '';
                        '</p>' ?>


                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="pass" placeholder="Mật Khẩu">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        <?php echo !empty($error['pass']['required']) ? '<p style="color: red;">' . $error['pass']['required'] . '</p>' : ''; ?>


                        <div class="wrap-input100 validate-input" data-validate="Comfirm password">
                            <input class="input100" type="password" name="cpass" placeholder="Nhập lại mật Khẩu">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        <?php
                        echo !empty($error['cpass']['required']) ? '<p style="color: red;">' . $error['cpass']['required'] . '</p>' : '';
                        echo !empty($error['cpass']['mismatch']) ? '<p style="color: red;">' . $error['cpass']['mismatch'] . '</p>' : '';
                        ?>


                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Nhớ mật khẩu
                            </label>
                        </div>

                        <div class="container-login100-form-btn ">
                            <input type="submit" value="Đăng ký" class="loginsubmit" id="signup" name="signup">


                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>
    </section>
    <!--===============================================================================================-->
    <script src="/view/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/view/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/view/vendor/bootstrap/js/popper.js"></script>
    <script src="/view/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/view/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/view/vendor/daterangepicker/moment.min.js"></script>
    <script src="/view/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/view/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/view/js/main.js"></script>

</body>

</html>