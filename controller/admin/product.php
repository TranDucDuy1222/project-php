<?php
    // include_once 'view/head.php';
    // include_once 'view/header.php';
    include_once 'modal/data.php';
    $conn = data();
    // include_once 'modal/product.php';
    if ($_GET['act']) {
        switch ($_GET['act']) {
            case 'admin':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                    header("Location: index.php");
                }
                // include_once 'modal/data.php';
                include_once 'modal/product.php';
                    $data['dssp'] = get_products();
                
                include_once 'view/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin.php';
                include_once 'view/template_admin_footer.php';
                break;
            case 'add':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                    header("Location: index.php");
                }
                // include_once 'modal/data.php';
                include_once 'modal/product.php';
                include_once 'modal/category.php';
                $data['dsdm'] = get_categories();
                if( isset($_POST['submit'])){
                    $kq = add_product(
                        $_POST['tensp'],
                        $_POST['motachitiet'],
                        $_POST['motangan'],
                        $_POST['gia'],
                        $_POST['giakhuyenmai'],
                        $_POST['soluong'],
                        $_POST['madm'],
                        $_FILES['anhsp']['name']
                        );
                        if($kq){
                            // kq đúng , thêm thành công 
                            if($_FILES['anhsp']['error']==0){
                                $kq = move_uploaded_file(
                                    $_FILES['anhsp']['tmp_name'],"upload/product/".$_FILES['anhsp']['name']
                                );
                            }
                            if($kq){
                                // kq đúng
                                header("Location: admin.php?mod=product&act=admin");
                            }
                        }
                    }
                    $data['dssp'] = get_products();
                    include_once 'view/template_admin_head.php';
                    include_once 'view/admin/template_admin_header.php';
                    include_once 'view/product_add.php';
                    include_once 'view/template_admin_footer.php';
                    break;
                    case 'edit':
                        if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                            header("Location: index.php");
                        }
                        include_once 'modal/data.php';
                        include_once 'modal/product.php';
                        include_once 'modal/category.php';
                        $data['dsdm'] = get_categories();
                        if(isset($_GET['id'])){
                            $data['sp'] = get_product($_GET['id']);
                        }
                        if( isset($_POST['submit']) ){
                            // gán $anh = ảnh mới 
                            $anh =  $_FILES['anhsp']['name'];
                            if($_FILES['anhsp']['error']!=0){
                                // không có ảnh hoặc ảnh bị lỗi thì lấy lại ảnh cũ 
                                $anh = $data['sp']['anhsp'];
                            }
                            $kq = edit_product(
                                $_GET['id'],
                                $_POST['tensp'],
                                $_POST['motachitiet'],
                                $_POST['motangan'],
                                $_POST['gia'],
                                $_POST['giakhuyenmai'],
                                $_POST['soluong'],
                                $_POST['madm'],
                                // $_FILES['anhsp']['name']
                                $anh
                                );
                                if($kq){
                                    // kq đúng , thêm thành công 
                                    if($_FILES['anhsp']['error']==0){
                                        $kq = move_uploaded_file(
                                            $_FILES['anhsp']['tmp_name'],"upload/product/".$_FILES['anhsp']['name']
                                        );
                                    }
                                    if($kq){
                                        // kq đúng
                                        header("Location: admin.php?mod=product&act=admin");
                                    }else{
                                        // thông báo lỗi
                                    }
                                }
                                else{
                                    // thonng báo lỗi
                                }
                            }
                            // $data['dssp'] = get_products();
                            include_once 'view/template_admin_head.php';
                            include_once 'view/admin/template_admin_header.php';
                            include_once 'view/product_edit.php';
                            include_once 'view/template_admin_footer.php';
                            break;
                            case 'delete':
                                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                                    header("Location: index.php");
                                }
                                include_once 'modal/data.php';
                                include_once 'modal/product.php';
                                if( isset($_GET['id'])){
                                  $kq = delete_product($_GET['id']);
                                  if($kq){
                                    //kq đúng, xóa thành công
                                    header("Location: admin.php?mod=product&act=admin");
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