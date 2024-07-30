<?php 
// tât cả account
    function get_accounts(){
        global $conn;
        $conn = data();
        $sql = "SELECT * FROM taikhoan";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    function get_tk_user(){
        global $conn;
        $conn = data();
        $matk = get_matk_of_logged_in_user(); // 
        $sql = "SELECT * FROM taikhoan WHERE matk = :matk";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':matk', $matk, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    // 1 âcount
    function get_account($id){
        global $conn;
        $conn = data();
        $sql = "SELECT * FROM taikhoan WHERE matk = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
    // edit
function edit_account($matk, $matkhau, $sodienthoai, $quyen){
    global $conn;
    $conn = data();
    $sql = "UPDATE taikhoan SET matkhau=:matkhau, sodienthoai=:sodienthoai, quyen=:quyen";
    $sql .= " WHERE matk=:matk";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":matk", $matk);
    $stmt->bindParam(":matkhau", $matkhau);
    $stmt->bindParam(":sodienthoai", $sodienthoai);
    $stmt->bindParam(":quyen", $quyen);
    return $stmt->execute();
}
// add
function add_account($hoten, $email, $matkhau, $sodienthoai,$anhtk,$diachi,$quyen){
    global $conn;
    $conn = data();
    $sql = "INSERT INTO taikhoan (`hoten`, `email`, `matkhau`, `sodienthoai`,`anhtk`,`diachi`,`quyen`) VALUES (:hoten, :email, :matkhau, :sodienthoai,:anhtk,:diachi,:quyen)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":hoten", $hoten);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":matkhau", $matkhau);
    $stmt->bindParam(":sodienthoai", $sodienthoai);
    $stmt->bindParam(":anhtk", $anhtk);
    $stmt->bindParam(":diachi", $diachi);
    $stmt->bindParam(":quyen", $quyen);
    return $stmt->execute();
}
// xóa
function delete_account($matk){
    global $conn;
    $conn = data();
    $sql = "DELETE FROM taikhoan WHERE matk=:matk";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":matk", $matk);
    return $stmt->execute();
}

// đổi mật khẩu cá nhân
function doi_mk($matk, $matkhau){
    global $conn;
    $conn = data();
    $sql = "UPDATE taikhoan SET matkhau=:matkhau";
    $sql .= " WHERE matk=:matk";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":matk", $matk);
    $stmt->bindParam(":matkhau", $matkhau);
    return $stmt->execute();
}
// đổi sdt cá nhân
function doi_sdt($matk, $sodienthoai){
    global $conn;
    $conn = data();
    $sql = "UPDATE taikhoan SET sodienthoai=:sodienthoai";
    $sql .= " WHERE matk=:matk";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":matk", $matk);
    $stmt->bindParam(":sodienthoai", $sodienthoai);
    return $stmt->execute();
}
// đổi hoten cá nhân
function doi_ten($matk, $hoten){
    global $conn;
    $conn = data();
    $sql = "UPDATE taikhoan SET hoten=:hoten";
    $sql .= " WHERE matk=:matk";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":matk", $matk);
    $stmt->bindParam(":hoten", $hoten);
    return $stmt->execute();
}
// đổi gmail cá nhân
function doi_gmail($matk, $email){
    global $conn;
    $conn = data();
    $sql = "UPDATE taikhoan SET email=:email";
    $sql .= " WHERE matk=:matk";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":matk", $matk);
    $stmt->bindParam(":email", $email);
    return $stmt->execute();
}