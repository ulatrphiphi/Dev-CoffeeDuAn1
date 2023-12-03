<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/users.php";
include "model/categories.php";
include "model/products.php";
include "model/cart.php";
include "global.php";
include "mail/PHPMailer/index.php";
$mail = new Mailer();
$newproducts = show_news_products();
$allproducts = show_all_products();


if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];


if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'menu':
            include 'view/header.php';
            include 'view/menu.php';
            include 'view/footer.php';
            break;
        case 'services':
            include 'view/header.php';
            include 'view/services.php';
            include 'view/footer.php';
            break;
        case 'blog':
            include 'view/header.php';
            include 'view/blog.php';
            include 'view/footer.php';
            break;
        case 'about':
            include 'view/header.php';
            include 'view/about.php';
            include 'view/footer.php';
            break;
        case 'contact':
            include 'view/header.php';
            include 'view/contact.php';
            include 'view/footer.php';
            break;
        case 'cart':
            include 'view/header.php';
            include 'view/cart.php';
            include 'view/footer.php';
            break;
        
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $role = $_POST['role'];
                $checkuser = checkuser($user);
                if ($checkuser) {
                    if (password_verify($pass, $checkuser['pass'])) {
                        $_SESSION['user_id'] = $checkuser['id'];
                        header('Location: index.php?act=home');
                    } else {
                        $msg = 'Sai tên đăng nhập hoặc mật khẩu!';
                    }
                } else {
                    $msg = 'Tài khoản không tồn tại!';
                }
            }
            include "view/login.php";
            break;
            // case 'signup':
            //     if (isset($_POST['signup']) && ($_POST['signup'])) {
            //         $email = $_POST['email'];
            //         $user = $_POST['user'];
            //         $pass = $_POST['pass'];
            //         $cpass = $_POST['cpass'];
            //         insert_user($email, $user, $pass, $cpass);
            //     }
            //     include 'view/signup.php';
            //     break;

        case 'signup':
            if (isset($_POST['signup']) && ($_POST['signup'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $cpass = $_POST['cpass'];

                // Thực hiện kiểm tra hợp lệ
                $errors = array();

                // Kiểm tra email
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Email không hợp lệ';
                }

                // Kiểm tra tên người dùng
                if (empty($user)) {
                    $errors[] = 'Tên người dùng không được trống';
                } elseif (is_user_exists($user)) {
                    $errors[] = 'Tên người dùng đã tồn tại';
                }

                // Kiểm tra mật khẩu
                if (empty($pass)) {
                    $errors[] = 'Mật khẩu không được trống';
                }

                // Kiểm tra xác nhận mật khẩu
                if (empty($cpass)) {
                    $errors[] = 'Vui lòng xác nhận mật khẩu';
                } elseif ($pass !== $cpass) {
                    $errors[] = 'Xác nhận mật khẩu không khớp';
                }

                // Nếu không có lỗi, thêm người dùng vào cơ sở dữ liệu
                if (empty($errors)) {
                    insert_user($email, $user, $pass, $cpass);
                    header('LOCATION: index.php?act=login');
                    exit();
                }
                // else {
                //     // Nếu có lỗi, hiển thị thông báo lỗi
                //     foreach ($errors as $error) {
                //         echo $error . '<br>';
                //     }
                // }
            }

            include 'view/signup.php';
            break;

        case 'logout':
            session_unset();
            header('LOCATION: index.php?act=home');
            break;
        case 'edit_user':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_user($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);
                // echo '<script>alert("Cập nhật thành công")</script>';
                include "view/home.php";
            }
            include "view/edit_user.php";
            break;
        case 'forgetpass':
            include "view/forgetpass.php";
            break;
        case 'productdetail':
            include 'view/header.php';
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $id=$_GET['id'];  
                $oneproduct=load_one_products($id);
                extract($oneproduct);
                $relatedpro=load_product_related($id,$categories_id);
            include "view/product-single.php";
            }else{
                include "view/home.php";
            }
            include 'view/footer.php';
            break;
        default:
            include 'view/header.php';
            include 'view/home.php';
            include 'view/footer.php';
            break;
    }
} else {
    include 'view/header.php';
    include 'view/home.php';
    include 'view/footer.php';
}
