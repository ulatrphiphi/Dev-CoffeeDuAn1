
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quên mật khẩu</title>
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
                    <form class="login100-form validate-form" action="" method="POST">
                        <span class="login100-form-logo">
                           <a href="index.php"><img src="/view/images/logo.png" width="160px" alt=""></a>
                            <!-- <i class="zmdi zmdi-landscape"></i> -->
                        </span>
                        <?php
                            if(isset($_POST['submit'])){
                                $error = [];
                                $email = $_POST['email'];
                                if($email == ''){
                                    $error['email'] = "Không được để trống";
                                }
                                if(empty($error)){
                                    $result = $user -> checkemail($email);
                                    $code = substr(rand(0,999999),0,6);
                                    $title = "Quên mật khẩu";
                                    $content = "Mã xác nhận của bạn là: <span style='color:red'>".$code."</span>";
                                    $mail->sendMail($title, $content, $email);

                                    $_SESSION['mail'] = $email;
                                    $_SESSION['code'] = $code;
                                    header('LOCATION: verification.php');
                                }
                            }
                        ?>
                        <span class="login100-form-title p-b-34 p-t-27">
                            Quên mật khẩu
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Enter Email">
                            <input class="input100" type="email" name="email" placeholder="Nhập email">
                            <span style="color: red;"><? if (isset($error['email'])) echo $error['email']?></span>
                        </div>

                        <div class="container-login100-form-btn ">
                            <input type="submit" value="Gửi yêu cầu" class="loginsubmit" name="submit"> 
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