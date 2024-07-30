<?php
    // include_once 'view/head.php';
    // include_once 'view/header.php';
    include_once 'modal/data.php';
    $conn = data();
    // include_once 'modal/product.php';
    if ($_GET['act']) {
        switch ($_GET['act']) {
            case 'account':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                    header("Location: index.php");
                }
                include_once 'modal/data.php';
                include_once 'modal/account.php';
                // include_once 'modal/product.php';
                    $data['dsaccount'] = get_accounts();
                include_once 'view/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/account.php';
                include_once 'view/template_admin_footer.php';
                break; 
                case 'add':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                        header("Location: index.php");
                    }
                    include_once 'modal/data.php';
                    include_once 'modal/account.php';
                    $data['dsaccount'] = get_accounts();
                    if( isset($_POST['submit'])){
                        $kq = add_account(
                            $_POST['hoten'],
                            $_POST['email'],
                            $_POST['matkhau'],
                            $_POST['sodienthoai'],
                            $_POST['anhtk']['name'],
                            $_POST['diachi'],
                            $_POST['quyen']
                        );
                        if($kq){
                            // kq đúng , thêm thành công 
                            if($_FILES['anhtk']['error']==0){
                                $kq = move_uploaded_file(
                                    $_FILES['anhtk']['tmp_name'],"upload/product/".$_FILES['anhtk']['name']
                                );
                            }
                            if($kq){
                                // kq đúng
                                header("Location: admin.php?mod=account&act=account");
                            }
                        }
                    }
                        include_once 'view/template_admin_head.php';
                        include_once 'view/admin/template_admin_header.php';
                        include_once 'view/admin/add_account.php';
                        include_once 'view/template_admin_footer.php';
                        break;
                case 'edit':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                        header("Location: index.php");
                    }
                    include_once 'modal/data.php';
                    include_once 'modal/account.php';
                    $data['dsaccount'] = get_accounts();
                    if(isset($_GET['id'])){
                        $data['account'] = get_account($_GET['id']);
                    }
                    if( isset($_POST['submit'])){                             
                        $kq = edit_account(
                            $_GET['id'],
                            $_POST['matkhau'],
                            $_POST['sodienthoai'],
                            $_POST['quyen']
                            );
                                if($kq){
                                    // kq đúng
                                    header("Location: admin.php?mod=account&act=account");
                                }else{
                                    // thông báo lỗi
                                }
                            }
                            else{
                                // thonng báo lỗi
                            }
                        include_once 'view/template_admin_head.php';
                        include_once 'view/admin/template_admin_header.php';
                        include_once 'view/admin/edit_account.php';
                        include_once 'view/template_admin_footer.php';
                        break;  
                        case 'delete':
                            if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                                header("Location: index.php");
                            }
                            include_once 'modal/data.php';
                            include_once 'modal/account.php';
                            if( isset($_GET['id'])){
                              $kq = delete_account($_GET['id']);
                              if($kq){
                                //kq đúng, xóa thành công
                                header("Location: admin.php?mod=account&act=account");
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