<?php
    // include_once 'view/head.php';
    // include_once 'view/header.php';
    include_once 'modal/data.php';
    $conn = data();
    // include_once 'modal/product.php';
    if ($_GET['act']) {
        switch ($_GET['act']) {
            case 'category':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                    header("Location: index.php");
                }
                include_once 'modal/data.php';
                include_once 'modal/category.php';
                // include_once 'modal/product.php';
                    $data['dscategory'] = get_categories();
                include_once 'view/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/category.php';
                include_once 'view/template_admin_footer.php';
                break;
                case 'add':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
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
                                header("Location: admin.php?mod=category&act=category");
                            }                          
                            }
                        include_once 'view/template_admin_head.php';
                        include_once 'view/admin/template_admin_header.php';
                        include_once 'view/add_category.php';
                        include_once 'view/template_admin_footer.php';
                        break;
                        case 'edit':
                            if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
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
                                            header("Location: admin.php?mod=category&act=category");
                                        }else{
                                            // thông báo lỗi
                                        }
                                    }
                                    else{
                                        // thonng báo lỗi
                                    }
                                include_once 'view/template_admin_head.php';
                                include_once 'view/admin/template_admin_header.php';
                                include_once 'view/edit_category.php';
                                include_once 'view/template_admin_footer.php';
                                break;
                                case 'delete':
                                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                                        header("Location: index.php");
                                    }
                                    include_once 'modal/data.php';
                                    include_once 'modal/category.php';
                                    if( isset($_GET['id'])){
                                      $kq = delete_category($_GET['id']);
                                      if($kq){
                                        //kq đúng, xóa thành công
                                        header("Location: admin.php?mod=category&act=category");
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