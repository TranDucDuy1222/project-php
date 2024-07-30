<?php 
// nhiều 
    function get_categories(){
        global $conn;
        $conn = data();
        $sql = "SELECT * FROM danhmuc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    // từng cái
    function get_category($id){
        global $conn;
        $conn = data();
        $sql = "SELECT * FROM danhmuc WHERE madm = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
    /**hàm lọc danh mục */
    function get_products_by_category($allsanpham){
        global $conn;
        $conn = data();
        $sql = "SELECT sp.*, dm.tendm FROM sanpham sp INNER JOIN danhmuc dm ON sp.madm=dm.madm WHERE dm.tendm=:allsanpham";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':allsanpham', $allsanpham, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $sp = $stmt->fetchAll();
        return $sp;
    }
//  add category
function add_category($tendm){
    global $conn;
    $conn = data();
    $sql = "INSERT INTO danhmuc (`tendm`) VALUES (:tendm)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":tendm", $tendm);
    return $stmt->execute();
}
// edit
function edit_category($madm, $tendm){
    global $conn;
    $conn = data();
    $sql = "UPDATE danhmuc SET tendm=:tendm";
    $sql .= " WHERE madm=:madm";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":madm", $madm);
    $stmt->bindParam(":tendm", $tendm);
    return $stmt->execute();
}
// xóa
function delete_category($madm){
    global $conn;
    $conn = data();
    $sql = "DELETE FROM danhmuc WHERE madm=:madm";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":madm", $madm);
    return $stmt->execute();
}
?>





