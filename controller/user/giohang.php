<?php 
 include_once 'modal/product.php';
    include_once 'modal/data.php';
    include_once 'view/user/head.php';
    include_once 'view/user/header.php';
    $conn = data();
    if ($_GET['act']) 
        switch ($_GET['act']) {
            case 'giohang':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                    header("Location: index.php?mod=user&act=dangnhap");   
                }
                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = array();
                }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $masp = $_POST['masp'];
                        $tensp = $_POST['tensp'];
                        $size = $_POST['size'];
                        $color = $_POST['color'];
                        $soluong = $_POST['soluong'];
                        $anhsp = $_POST['anhsp'];
                        $gia = $_POST['gia'];

                        $new_item = array(
                            'masp' => $masp,
                            'tensp' => $tensp,
                            'size' => $size,
                            'color' => $color,
                            'soluong' => $soluong,
                            'anhsp' => $anhsp,
                            'gia' => $gia
                        );

                        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
                        $product_exists = false;
                        if (isset($_SESSION['giohang'])) {
                            foreach ($_SESSION['giohang'] as &$giohang_item) {
                                if ($giohang_item['masp'] == $masp && $giohang_item['size'] == $size && $giohang_item['color'] == $color) {
                                    $giohang_item['soluong'] += $soluong; // Cộng dồn số lượng
                                    $giohang_item['tongtien'] = $giohang_item['gia'] * $giohang_item['soluong'];
                                    $product_exists = true;
                                    break;
                                }
                            }
                        }
                        
                        if (!$product_exists) {
                            $_SESSION['giohang'][] = $new_item;
                        }

                        header('Location: index.php?mod=giohang&act=giohang');
                        exit();
                        
                    } 
                    
                include_once 'view/user/home_giohang.php';
                break;
            }
            include_once 'view/user/footer.php';
?>