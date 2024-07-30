<?php
function get_orders(){
    global $conn;
    $conn = data();
    $sql = "SELECT * FROM donhang";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
function csdl_sp($tensp){
    global $conn;
    $sql = "INSERT INTO donhang (`tensp`) VALUES (:tensp)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":tensp", $tensp);
    return $stmt->execute();
}
 // 1 âcount
 function get_order($id){
    global $conn;
    $conn = data();
    $sql = "SELECT * FROM donhang WHERE madh = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
function edit_order($madh, $diachi, $sdt){
    global $conn;
    $conn = data();
    $sql = "UPDATE donhang SET diachi=:diachi, sdt=:sdt ";
    $sql .= " WHERE madh=:madh";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":madh", $madh);
    $stmt->bindParam(":diachi", $diachi);
    $stmt->bindParam(":sdt", $sdt);
    return $stmt->execute();
}
function delete_order($madh){
    global $conn;
    $conn = data();
    $sql = "DELETE FROM donhang WHERE madh=:madh";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":madh", $madh);
    return $stmt->execute();
}
// (phương thức thanh toán) lấy giá trị nào trong csdl nào củng được trong bảng đơn hàng lấy theo matk
function get_ptthanhtoan(){
    global $conn;
    $conn = data();
    $matk = get_matk_of_logged_in_user(); // 
    $sql = "SELECT * FROM donhang WHERE matk = :matk LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':matk', $matk, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
function edit_pttt($madh, $pttt){
    global $conn;
    $conn = data();
    $sql = "UPDATE donhang SET pttt=:pttt";
    $sql .= " WHERE madh=:madh";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":madh", $madh);
    $stmt->bindParam(":pttt", $pttt);
    return $stmt->execute();
}

// Hàm lấy sản thông tin đặt hàng lên bảng đơn hàng
function order_tt($matk,$add_address,$gia,$pttt){
    global $conn;
    $conn = data();
    $sql = "INSERT INTO `donhang` (`madh`, `matk`, `matrangthai`, `madc`, `gia`, `pttt`, `ngaydathang`) 
            VALUES (NULL, :matk, '1', :madc, :gia, :pttt, CURRENT_TIMESTAMP);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":matk", $matk);
    $stmt->bindParam(":madc", $add_address);
    $stmt->bindParam(":gia", $gia);
    $stmt->bindParam(":pttt", $pttt);
    return $stmt->execute();
}
?>

