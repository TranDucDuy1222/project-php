<?php 
// đăng nhập
    function login($email, $password){
        global $conn;
        $sql = "SELECT * FROM taikhoan WHERE email='".$email."' AND matkhau='".$password."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch(); 
    }

    // đăng kí
    function signup($hoten, $email, $matkhau, $ngaysinh){
        global $conn;
        $sql = "INSERT INTO taikhoan (`hoten`, `email`, `matkhau`, `ngaysinh`) VALUES (:hoten, :email, :matkhau, :ngaysinh)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":hoten", $hoten);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":matkhau", $matkhau);
        $stmt->bindParam(":ngaysinh", $ngaysinh);
        return $stmt->execute();
    }
    
    function checkmail($email){
        global $conn;
        $sql = "SELECT * FROM taikhoan WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
?>