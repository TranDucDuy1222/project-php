<?php
    session_start();
    ob_start();
    // Điều hướng đến các controller
    if (isset($_GET['mod'])) {
        switch ($_GET['mod']) {
            case 'page':
                include_once 'controller/page.php';
                break;
            case 'user':
                include_once 'controller/user.php';
                break;
            case 'product':
                include_once 'controller/product.php';
                break;
            case 'sanpham':
                include_once 'controller/user/sanpham.php';
                break;
            case 'chitietsanpham':
                include_once 'controller/user/chitietsanpham.php';
                break;
            case 'giohang':
                include_once 'controller/user/giohang.php';
                break;
            case 'thanhtoan':
                include_once 'controller/user/thanhtoan.php';
                break;
            case 'buynow':
                include_once 'controller/user/buynow.php';
                break;
                case 'thongtin':
                    include_once 'controller/user/thongtin.php';
                    break;
            default:
                // Không chạy được lệnh ở trên trả về default
                // 404-trang wed kh tồn tại
                break;
        }
    }
    else{
        header("Location: ?mod=page&act=home");
    }
?>