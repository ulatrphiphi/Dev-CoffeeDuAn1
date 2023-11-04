<?php
session_start();
include 'view/header.php';

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'menu':
            include 'view/menu.php';
            break;
        case 'services':
            include 'view/services.php';
            break;
        case 'blog':
            include 'view/blog.php';
            break;
        case 'about':
            include 'view/about.php';
            break;
        case 'contact':
            include 'view/contact.php';
            break;
        default:
            include 'view/home.php';
            break;
    }
} else {
    include 'view/home.php';
}
include 'view/footer.php';
