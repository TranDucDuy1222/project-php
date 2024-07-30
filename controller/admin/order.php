<?php
    // include_once 'view/head.php';
    // include_once 'view/header.php';
    include_once 'modal/data.php';
    $conn = data();
    // include_once 'modal/product.php';
    if ($_GET['act']) {
        switch ($_GET['act']) {
            case 'order':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                    header("Location: index.php");
                }
                include_once 'modal/data.php';
                include_once 'modal/order.php';
                    $data['dsorder'] = get_orders();
                include_once 'view/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/order.php';
                include_once 'view/template_admin_footer.php';
                break;  
                case 'chitietdh':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                        header("Location: index.php");
                    }
                    include_once 'modal/data.php';
                    include_once 'modal/order_detail.php';
                    $data['dsdetail'] = get_order_detail();   
                    // $data['dstrangthai'] = get_trangthai();
                    include_once 'view/template_admin_head.php';
                    include_once 'view/admin/template_admin_header.php';
                    include_once 'view/admin/chitietdh.php';
                    include_once 'view/template_admin_footer.php';
                    break;
                case 'edit':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                        header("Location: index.php");
                    }
                    include_once 'modal/data.php';
                    include_once 'modal/order.php';
                    $data['dsorder'] = get_orders();
                    if(isset($_GET['id'])){
                        $data['order'] = get_order($_GET['id']);
                    }
                    if( isset($_POST['submit']) ){
                        $kq = edit_order(
                            $_GET['id'],
                            $_POST['diachi'],
                            $_POST['sdt']
                            );
                            if($kq){
                                // kq đúng
                                header("Location: admin.php?mod=order&act=order");
                            }else{
                                // thông báo lỗi
                            }
                        }
                        else{
                            // thonng báo lỗi
                        }
                        include_once 'view/template_admin_head.php';
                        include_once 'view/admin/template_admin_header.php';
                        include_once 'view/edit_order.php';
                        include_once 'view/template_admin_footer.php';
                        break;
                        case 'delete':
                            if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                                header("Location: index.php");
                            }
                            include_once 'modal/data.php';
                            include_once 'modal/order.php';
                            if( isset($_GET['id'])){
                              $kq = delete_order($_GET['id']);
                              if($kq){
                                //kq đúng, xóa thành công
                                header("Location: admin.php?mod=order&act=order");
                            }
                            // else{
                            //     $thongbao = "có lỗi vui lòng thử lại sau";
                            // }
                            }
                            break;
                default:          
                    # 404 - Trang wed kh tồn tại
                break;
        }
    }
    ?>