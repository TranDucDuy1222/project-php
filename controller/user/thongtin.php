<?php 
 include_once 'modal/product.php';
include_once 'modal/data.php';
include_once 'modal/account.php';
include_once 'modal/order.php';
    include_once 'view/user/head.php';
    include_once 'view/user/header.php';
    function get_matk_of_logged_in_user() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user']['matk'];
        }
        return null;
    }
    $conn = data();
    if ($_GET['act']){
        switch ($_GET['act']) {
            case 'thongtin':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                    header("Location: index.php?mod=user&act=dangnhap");   
                }
                $data['dstk'] = get_tk_user();
                include_once 'view/user/home_myprofile.php';
                break;
                case 'doipass':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                        header("Location: index.php");
                    }
                    $data['dsaccount'] = get_accounts();
                    if(isset($_GET['id'])){
                        $data['account'] = get_account($_GET['id']);
                    }
                    if( isset($_POST['submit'])){                             
                        $kq = doi_mk(
                            $_GET['id'],
                            $_POST['matkhau']
                            );
                                if($kq){
                                    // kq đúng
                                    header("Location: index.php?mod=thongtin&act=thongtin");
                                }else{
                                    // thông báo lỗi
                                }
                            }
                            else{
                                // thonng báo lỗi
                            }
                    include_once 'view/user/home_doipass.php';
                break;  
                case 'doisdt':
                        if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                            header("Location: index.php");
                        }
                        include_once 'modal/data.php';
                        include_once 'modal/account.php';
                        $data['dsaccount'] = get_accounts();
                        if(isset($_GET['id'])){
                            $data['account'] = get_account($_GET['id']);
                        }
                        if( isset($_POST['submit'])){                             
                            $kq = doi_sdt(
                                $_GET['id'],
                                $_POST['sodienthoai']
                                );
                                    if($kq){
                                        // kq đúng
                                        header("Location: index.php?mod=thongtin&act=thongtin");
                                    }else{
                                        // thông báo lỗi
                                    }
                                }
                                else{
                                    // thonng báo lỗi
                                }
                    include_once 'view/user/home_doisdt.php';
                break; 
                case 'doiten':
                        if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                            header("Location: index.php");
                        }
                        include_once 'modal/data.php';
                        include_once 'modal/account.php';
                        $data['dsaccount'] = get_accounts();
                        if(isset($_GET['id'])){
                            $data['account'] = get_account($_GET['id']);
                        }
                        if( isset($_POST['submit'])){                             
                            $kq = doi_ten(
                                $_GET['id'],
                                $_POST['hoten']
                                );
                                    if($kq){
                                        // kq đúng
                                        header("Location: index.php?mod=thongtin&act=thongtin");
                                    }else{
                                        // thông báo lỗi
                                    }
                                }
                                else{
                                    // thonng báo lỗi
                                }
                    include_once 'view/user/home_doiten.php';
                break;  
                case 'doigmail':
                        if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                            header("Location: index.php");
                        }
                        
                        $data['dsaccount'] = get_accounts();
                        if(isset($_GET['id'])){
                            $data['account'] = get_account($_GET['id']);
                        }
                        if( isset($_POST['submit'])){                             
                            $kq = doi_gmail(
                                $_GET['id'],
                                $_POST['email']
                                );
                                    if($kq){
                                        // kq đúng
                                        header("Location: index.php?mod=thongtin&act=thongtin");
                                    }else{
                                        // thông báo lỗi
                                    }
                                }
                                else{
                                    // thonng báo lỗi
                                }
                    include_once 'view/user/home_doigmail.php';
                break;  
                case 'order':
                    // include_once 'modal/diachi.php';
                    // $matk = get_matk_of_logged_in_user();
                    // $data['dsdiachi'] = get_diachi();
                        if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                            header("Location: index.php");
                        }
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Thêm thông tin đặt hàng vào bảng donhang
                            $order_information = order_tt($_POST['matk'],$_POST['add_address'],$_POST['gia'],$_POST['pttt']);
                            if(isset($_POST['submit-order'])) {
                                if (!isset($_SESSION['order'])) {
                                    $_SESSION['order'] = array();
                                }
                                $_SESSION['order'] = array_merge($_SESSION['order'], $_SESSION['thanhtoan']);
                                // Xóa sản phẩm khỏi 'thanhtoan'
                                unset($_SESSION['thanhtoan']);
                            }
                            
                        }
                    include_once 'view/user/home_order.php';
                break;
        }  
    }
        
            
include_once 'view/user/footer.php';
?>