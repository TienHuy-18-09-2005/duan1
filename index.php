<?php

session_start();

require_once './commons/env.php';
require_once './commons/functions.php';

require_once './controllers/HomeController.php';

require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';



$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']); die();

// if ($_GET['act'] ?? '/') {
//     $act = $_GET['act'];
// } else {
//     $act = '/';
// }

match($act) {
    '/' => (new HomeController())->home(),

    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),

    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),

};