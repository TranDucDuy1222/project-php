<?php 
 include_once 'modal/product.php';
    include_once 'modal/data.php';
    if ($_GET['act']) 
        switch ($_GET['act']) {
            case 'buynow':
                include_once 'modal/diachi.php';
                    if(isset($_POST['submit-diachi']) ){
                        $data['dsdiachi'] = get_diachi();    
                     if($data['dsdiachi']){
                        $data['dsdiachi'] = csdl_diachi($_POST['sdt'], $_POST['hoten'], $_POST['tp'], $_POST['quan'], $_POST['diachichitiet']);
                            }
                        }                
                include_once 'view/user/head.php';
                include_once 'view/user/header.php';
                include_once 'view/user/buynow.php';
                include_once 'view/user/footer.php';
                break;
                case 'delete':
                    if( !(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'user')){
                        header("Location: index.php");
                    }
                    include_once 'modal/data.php';
                    include_once 'modal/diachi.php';
                    if( isset($_GET['id'])){
                      $kq = delete_diachi($_GET['id']);
                      if($kq){
                        //kq đúng, xóa thành công
                        header("Location: index.php?mod=buynow&act=buynow");
                    }
                    // else{
                    //     $thongbao = "có lỗi vui lòng thử lại sau";
                    // }
                    }
                    break;
            }
?>
