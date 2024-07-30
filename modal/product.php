<?php

// Lấy ra sản phẩm kết nối với CSDL từ data.php
/**trang sp con */
function getproduct($pro){
    $conn = data();
    // Nếu muốn lấy ra sp có giá sale thì bỏ đi số 1 sau where và truyền lại tham số ở (controller/product.php)
    $sql = " SELECT * FROM sanpham WHERE 1";
    if ($pro == 1) {
        // Truyền tham số là 1 thì view ra toàn bộ sản phẩm
        $sql .= " ORDER BY masp desc ";
    }
    else{
        // Ngẫu nhiên 1 tham số in ra các sản phẩm có sale
        $sql .= " giakhuyenmai>0 ORDER BY masp desc ";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $sp = $stmt->FetchAll();
    return $sp;
}
function chitiet($masp){
    $conn = data();
    $sql = "SELECT * FROM sanpham WHERE masp = :masp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':masp', $masp, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
/**atrang product sản phẩm admin*/
function get_products(){
    global $conn;
    $conn = data();
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp INNER JOIN danhmuc dm ON sp.madm=dm.madm";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
function get_product($id){
    global $conn;
    $conn = data();
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp INNER JOIN danhmuc dm ON sp.madm=dm.madm WHERE sp.masp=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
function add_product($tensp, $motachitiet, $motangan, $gia,$giakhuyenmai, $soluong, $madm, $anhsp){
    global $conn;
    $conn = data();
    $sql = "INSERT INTO sanpham (`tensp`, `motachitiet`, `motangan`, `gia`,`giakhuyenmai`, `soluong`, `madm`, `anhsp`) VALUES (:tensp, :motachitiet, :motangan, :gia,:giakhuyenmai, :soluong, :madm, :anhsp)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":tensp", $tensp);
    $stmt->bindParam(":motachitiet", $motachitiet);
    $stmt->bindParam(":motangan", $motangan);
    $stmt->bindParam(":gia", $gia);
    $stmt->bindParam(":giakhuyenmai", $giakhuyenmai);
    $stmt->bindParam(":soluong", $soluong);
    $stmt->bindParam(":madm", $madm);
    $stmt->bindParam(":anhsp", $anhsp);
    return $stmt->execute();
}
function edit_product($masp, $tensp, $motachitiet, $motangan, $gia, $giakhuyenmai, $soluong, $madm, $anhsp){
    global $conn;
    $conn = data();

    $sql = "UPDATE sanpham SET tensp=:tensp, motachitiet=:motachitiet, motangan=:motangan, gia=:gia, giakhuyenmai=:giakhuyenmai, soluong=:soluong, madm=:madm";
    
    // Kiểm tra xem người dùng đã tải lên ảnh mới hay chưa
    if(isset($_FILES['anhsp']['name']) && $_FILES['anhsp']['error'] == 0){
        $sql .= ", anhsp=:anhsp";
    }
    $sql .= " WHERE masp=:masp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":masp", $masp);
    $stmt->bindParam(":tensp", $tensp);
    $stmt->bindParam(":motachitiet", $motachitiet);
    $stmt->bindParam(":motangan", $motangan);
    $stmt->bindParam(":gia", $gia);
    $stmt->bindParam(":giakhuyenmai", $giakhuyenmai);
    $stmt->bindParam(":soluong", $soluong);
    $stmt->bindParam(":madm", $madm);
    // Kiểm tra xem người dùng đã tải lên ảnh mới hay chưa
    if(isset($_FILES['anhsp']['name']) && $_FILES['anhsp']['error'] == 0){
        $stmt->bindParam(":anhsp", $anhsp);
    }
    return $stmt->execute();
}
function delete_product($masp){
    global $conn;
    $conn = data();
    $sql = "DELETE FROM sanpham WHERE masp=:masp";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":masp", $masp);
    return $stmt->execute();
}

// Sản phẩm tương tự
function product_random(){
    global $conn;
    $conn = data();
    $sql = "SELECT * FROM `sanpham` ORDER BY RAND() LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
?>