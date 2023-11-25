<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/users.php";
include "model/categories.php";
include "mail/PHPMailer/index.php";
$mail = new Mailer();




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
        case 'login':
            if(isset($_POST['login'])&&($_POST['login'])){
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $checkuser=checkuser($user, $pass);
                if(is_array($checkuser)){
                    $_SESSION['user']=$checkuser;
                    header('Location: index.php?act=home');
                }else{
                    // echo '<script>alert("Tài khoản không tồn tại. Vui lòng đăng ký thành viên!")</script>';
                }
                include "view/login.php";
            }
            include "view/login.php";
            break;
        case 'signup':
                if(isset($_POST['signup'])&&($_POST['signup'])){
                    $email=$_POST['email'];
                    $user=$_POST['username'];
                    $pass=$_POST['pass'];
                    $cpass=$_POST['cpass'];
                    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                    // insert_user($email, $user, $pass, $cpass);
                    // echo '<script>alert("Đăng ký thành công, mời đăng nhập")</script>';
                    // header('LOCATION: index.php?act=login');
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



