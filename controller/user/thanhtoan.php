<?php
include_once 'modal/product.php';
include_once 'modal/data.php';
include_once 'modal/diachi.php';
include_once 'modal/order.php';
include_once 'view/user/head.php';
include_once 'view/user/header.php';
function get_matk_of_logged_in_user() {
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']['matk'];
    }
    return null;
}
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'thanhtoan':
            // Lưu những sản phẩm được người dùng chọn để thanh toán
            if (!isset($_SESSION['thanhtoan'])) {
                $_SESSION['thanhtoan'] = array();
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_product'])) {
                $select_product = $_POST['select_product'];
                foreach ($select_product as $selected_product) {
                    foreach ($_SESSION['giohang'] as $key => $giohang_item) {
                        if ($giohang_item['masp'] == $selected_product) {
                            $_SESSION['thanhtoan'][$selected_product] = $giohang_item;
                            unset($_SESSION['giohang'][$key]);
                            break;
                        }
                    }
                }
            }
        
            if (isset($_POST['submit-diachi'])) {
                $matk = get_matk_of_logged_in_user();
                $data['dsdiachi'] = get_diachi();
                if ($matk) {
                    try {
                        // Thêm địa chỉ vào cơ sở dữ liệu
                        $d = csdl_diachi($_POST['sdt'], $_POST['hoten'], $_POST['tp'], $_POST['quan'], $_POST['diachichitiet'], $matk);
                        if ($d) {
                            header("Location: index.php?mod=thanhtoan&act=thanhtoan");
                            exit();
                        } else {
                            echo "Error inserting address into the database.";
                        }
                    } catch (PDOException $e) {
                        echo "Database error: " . $e->getMessage();
                    }
                }
            }
        
            $data['pttt'] = get_ptthanhtoan();
            include_once 'view/user/home_thanhtoan.php';
            break;        

            case 'returncart':
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['masp'])) {
                    $masp = $_POST['masp'];
                    if (isset($_SESSION['thanhtoan'][$masp])) {
                        $_SESSION['giohang'][$masp] = $_SESSION['thanhtoan'][$masp];
                        unset($_SESSION['thanhtoan'][$masp]);
                    }
                    header('Location: index.php?mod=thanhtoan&act=thanhtoan');
                    // quay lại trang thanh toán
                    exit();
                }
                break;
            // case 'edit':
            //     if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
            //         header("Location: index.php");
            //     }
                // if(isset($_GET['id'])){
                //     $data['dsdiachi'] = get_diachi();
                //     $data['sp'] = get_order($_GET['id']);
                // }
                // if( isset($_POST['submit']) ){                             
                //     $kq = edit_pttt(
                //         $_GET['id'],
                //         $_POST['pttt']
                //         );
                //         if($kq){
                //             // kq đúng
                //             header("Location: index.php?mod=thanhtoan&act=thanhtoan");
                //         }else{
                //             // thông báo lỗi
                //         }
                // }
                // else{
                //     // thonng báo lỗi
                // }    
                // $data['pttt'] = get_ptthanhtoan();
                // include_once 'view/user/doi_pttt.php';
                //     break;
        case 'delete':
            if (!(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')) {
                header("Location: index.php");
                exit();
            }
            if (isset($_GET['id'])) {
                try {
                    $kq = delete_diachi($_GET['id']);
                    if ($kq) {
                        header("Location: index.php?mod=thanhtoan&act=thanhtoan");
                        exit();
                    }
                } catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage();
                }
            }
            break;
    }

}
include_once 'view/user/footer.php';
