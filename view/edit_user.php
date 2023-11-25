

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Nhập</title>
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
                <?php 
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);
                }
                ?>
                    <form class="login100-form validate-form" action="index.php?act=home" method="POST">
                        <span class="login100-form-logo">
                           <a href="index.php"><img src="/view/images/logo.png" width="160px" alt=""></a>
                            <!-- <i class="zmdi zmdi-landscape"></i> -->
                        </span>
                        
                        <span class="login100-form-title p-b-34 p-t-27">
                            Chỉnh sửa tài khoản
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                            <input class="input100" type="text" name="user" value="<?=$user?>">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                        
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="pass" value="<?=$pass?>">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="email" name="email" value="<?=$email?>">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="text" name="address" value="<?=$address?>">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="text" name="tel" value="<?=$tel?>">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        
                        
                        <div class="container-login100-form-btn ">
                        <input type="hidden" name="id" value="<?=$id?>">
                         <input type="submit" value="Cập nhật" class="loginsubmit" name="update"> 
                               
                            
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