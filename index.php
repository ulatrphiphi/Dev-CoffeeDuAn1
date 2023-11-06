<?php
session_start();


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
            include 'view/login.php';
            break;
        case 'signup':
            include 'view/signup.php';
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



