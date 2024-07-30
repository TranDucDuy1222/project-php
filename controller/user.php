<?php
include_once 'view/user/head.php';
include_once 'view/user/header.php';
include_once 'modal/data.php';
include_once 'modal/user.php';
$conn = data(); // Gọi hàm kết nối CSDL
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'dangnhap':
                         // Hiển thị thông báo
    if(!(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')) {
        echo '<div class="alert alert-danger text-center">You need to log in to purchase!</div>';
    }
                include_once 'view/dangnhap.php';
                if (isset($_POST['submit-signin'])) {
                    $kq = login($_POST['email'], $_POST['matkhau']);
                    if($kq){
                        $_SESSION['user'] = $kq;
                        if($kq['quyen'] == 'admin'){
                            header("Location: admin.php");
                        } else if($kq['quyen'] == 'nhanvien'){
                            header("Location: nhanvien.php");
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        echo "<script>alert('Email or password is incorrect, Please re-enter!');</script>";
                    }
                }
                break;
        case 'dangky':
            include_once 'view/dangky.php';
            if(isset($_POST['submit-signup']) ){
                // kiểm tra thử có email này có trong cơ sở dữ liệu chưa
                $kq = checkmail($_POST['email']);
                if($kq){
                    echo "<script>alert('Your email already exists, please use another email!');</script>";
                }
                else{
                    $kq = signup($_POST['hoten'], $_POST['email'], $_POST['matkhau'], $_POST['ngaysinh']);
                    if ($kq) {
                        header("Location: index.php");
                    }
                }
            }
            break;
            case 'dangxuat':
                session_start(); // Bắt đầu phiên làm việc
                // Kiểm tra xem người dùng đã đăng nhập chưa
                if(isset($_SESSION['user'])){
                    // Hủy bỏ các biến session liên quan đến người dùng
                    unset($_SESSION['user']);
                    // Tiếp theo, hủy bỏ toàn bộ session
                    session_destroy();
                }
            
                // Chuyển hướng người dùng về trang chủ hoặc trang khác tùy chọn
                header("Location: index.php"); // Thay đổi URL theo yêu cầu của bạn
                break;         
        default:
            # 404 - Trang web không tồn tại
            break;
            }
        }
include_once 'view/user/footer.php';
?>
