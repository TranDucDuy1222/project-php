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
                    include_once 'controller/nhanvien/product.php';
                    break;
                case 'category':
                    include_once 'controller/nhanvien/category.php';
                    break;
                    case 'order':
                        include_once 'controller/nhanvien/order.php';
                        break;
                default:
                // Không chạy được lệnh ở trên trả về default
                // 404-trang wed kh tồn tại
                break;
        }
    }
    else{
        header("Location: nhanvien.php?mod=product&act=product");
    }
?>