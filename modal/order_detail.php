<?php 
function get_order_detail(){
    global $conn;
    $conn = data();
    $sql = "SELECT * FROM chitietdonhang";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

// function lienket(){
//     global $conn;
//     $conn = data();
//     $sql = "SELECT CT.* , DH.* FROM `chitietdonhang` CT INNER JOIN donhang DH ON CT.mactdh = DH.madh;";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     return $stmt->fetchAll();
// }
// trạng thái
// function get_trangthai(){
//     global $conn;
//     $conn = data();
//     $sql = "SELECT * FROM trangthai";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     return $stmt->fetchAll();
// }
?>