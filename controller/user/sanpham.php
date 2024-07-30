<?php
    include_once 'view/user/head.php';
    include_once 'view/user/header.php';
    include_once 'modal/data.php';
    include_once 'modal/product.php';
    include_once 'modal/category.php';
    if ($_GET['act']) {
        switch ($_GET['act']) {
            case 'allsanpham':
                $sp = getproduct(1);
                include_once 'view/user/all_sanpham.php';
            break;
            case 'loc_danhmuc':
                /** lọc sản phẩm bằng danh mục */
                // Lấy ra danh mục sản phẩm
                    $category = isset($_GET['category']) ? $_GET['category'] : '';
                    // Lấy ra sản phẩm theo danh mục
                    if ($category == 'shirt') {
                        $sp = get_products_by_category('shirt');
                    } elseif ($category == 'shoe') {
                        $sp = get_products_by_category('shoe');
                    } elseif ($category == 'trousers') {
                        $sp = get_products_by_category('trousers');
                    }elseif ($category == 'men') {
                        $sp = get_products_by_category('men');
                    }elseif ($category == 'women') {
                        $sp = get_products_by_category('women');
                    }elseif ($category == 'kid') {
                        $sp = get_products_by_category('kid');
                    } else {
                        $sp = getproduct(1); // Nếu không có danh mục được chọn, hiển thị tất cả sản phẩm
                    }
                    include_once 'view/user/all_sanpham.php';
                    break;
            default:
                # 404 - Trang wed kh tồn tại
                break;
        }
    }
    else {
        include_once 'index.php';
    }
    include_once 'view/user/footer.php';

?>