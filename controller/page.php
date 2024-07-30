<?php  
    if ($_GET['act']) {
        switch ($_GET['act']) {
            case 'home':
                include_once 'view/user/head.php';
                include_once 'view/user/header.php';
                include_once 'view/user/home.php';
                include_once 'view/user/footer.php';
            break;
            case 'dashboard':
                if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')){
                    header("Location: index.php");
                }
                include_once 'view/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/page_dashboard.php';
                include_once 'view/template_admin_footer.php';
                break;
            default:
                # 404 - Trang wed kh tồn tại
                break;
        }
    }
    else {
        include_once 'index.php';
    }
    // include_once 'view/dangnhap.php';
?>
