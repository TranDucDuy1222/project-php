<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $masp = $_GET['masp'];
    $soluong = $_GET['soluong'];

    if (isset($_SESSION['giohang'])) {
        foreach ($_SESSION['giohang'] as &$item) {
            if ($item['masp'] == $masp) {
                $item['soluong'] = $soluong;
                $item['tongtien'] = $item['gia'] * $soluong;
                echo "success";
                exit();
            }
        }
    }
    echo "error";
}
?>