<?php 
include_once 'modal/product.php';
include_once 'modal/data.php';
include_once 'view/user/head.php';
include_once 'view/user/header.php';
    if ($_GET['act']) 
        switch ($_GET['act']) {
            case 'chitietsp':
            // Kiểm tra nếu masp được truyền từ URL
            if (isset($_GET['masp'])) {
                $masp = $_GET['masp'];
                // Sử dụng mã sản phẩm để lấy thông tin chi tiết
                $productInfo = chitiet($masp);
            } else {
                // Xử lý khi không có mã sản phẩm được truyền
                echo "Mã sản phẩm không hợp lệ.";
            }
                $product_random = product_random();
                include_once 'view/user/home_chitietsp.php';
                break;
            }
include_once 'view/user/footer.php';
?>