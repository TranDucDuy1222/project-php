<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['masp'])) {
        $masp = $_GET['masp'];

        if (isset($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $key => $item) {
                if ($item['masp'] == $masp) {
                    unset($_SESSION['giohang'][$key]);

                    // Trả về một dấu hiệu thành công
                    echo "success";

                    exit(); // Kết thúc kịch bản xử lý
                }
            }
        }
    }
}

// Trả về một dấu hiệu lỗi nếu xóa không thành công
echo "error";
?>