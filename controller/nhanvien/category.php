<?php
    // include_once 'view/head.php';
    // include_once 'view/header.php';
    include_once 'modal/data.php';
    $conn = data();
    function get_matk_of_logged_in_user() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user']['matk'];
        }
        return null;
    }
    // include_once 'modal/product.php';
    if ($_GET['act']) {
        switch ($_GET['act']) {
            case 'category':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'nhanvien')){
                    header("Location: index.php");
                }
                include_once 'modal/data.php';
                include_once 'modal/category.php';
                include_once 'modal/account.php';

                    $data['dscategory'] = get_categories();
                    $data['dstk'] = get_tk_user();
                include_once 'view/template_admin_head.php';
                include_once 'view/nhanvien/template_nv_header.php';
                include_once 'view/nhanvien/category.php';
                include_once 'view/template_admin_footer.php';
                break;
                case 'add':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'nhanvien')){
                        header("Location: index.php");
                    }
                    include_once 'modal/data.php';
                    include_once 'modal/category.php';
                    $data['dsdm'] = get_categories();
                    if( isset($_POST['submit'])){
                        $kq = add_category(
                            $_POST['tendm'],
                            ); 
                            if($kq){
                                // kq đúng
                                header("Location: nhanvien.php?mod=category&act=category");
                            }                          
                            }
                        include_once 'view/template_admin_head.php';
                        include_once 'view/nhanvien/template_nv_header.php';
                        include_once 'view/add_category.php';
                        include_once 'view/template_admin_footer.php';
                        break;
                        case 'edit':
                            if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'nhanvien')){
                                header("Location: index.php");
                            }
                            include_once 'modal/data.php';
                            include_once 'modal/category.php';
                            $data['dsdm'] = get_categories();
                            if(isset($_GET['id'])){
                                $data['dm'] = get_category($_GET['id']);
                            }
                            if( isset($_POST['submit']) ){                             
                                $kq = edit_category(
                                    $_GET['id'],
                                    $_POST['tendm']
                                    );
                                        if($kq){
                                            // kq đúng
                                            header("Location: nhanvien.php?mod=category&act=category");
                                        }else{
                                            // thông báo lỗi
                                        }
                                    }
                                    else{
                                        // thonng báo lỗi
                                    }
                                include_once 'view/template_admin_head.php';
                                include_once 'view/nhanvien/template_nv_header.php';
                                include_once 'view/edit_category.php';
                                include_once 'view/template_admin_footer.php';
                                break;
                                case 'delete':
                                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'nhanvien')){
                                        header("Location: index.php");
                                    }
                                    include_once 'modal/data.php';
                                    include_once 'modal/category.php';
                                    if( isset($_GET['id'])){
                                      $kq = delete_category($_GET['id']);
                                      if($kq){
                                        //kq đúng, xóa thành công
                                        header("Location: nhanvien.php?mod=category&act=category");
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