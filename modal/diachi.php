<?php
function get_diachi(){
    global $conn;
    $conn = data();
    $matk = get_matk_of_logged_in_user(); // 
    $sql = "SELECT * FROM diachi WHERE matk = :matk LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':matk', $matk, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
function csdl_diachi($sdt, $hoten, $tp, $quan, $diachichitiet,$matk){
    global $conn; // Assuming that $conn is your database connection            
    // SQL query with placeholders
    $sql = "INSERT INTO diachi (`sdt`, `hoten`, `tp`, `quan`, `diachichitiet`,`matk`) 
            VALUES (:sdt, :hoten, :tp, :quan, :diachichitiet, :matk)";
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bindParam(":sdt", $sdt);
    $stmt->bindParam(":hoten", $hoten);
    $stmt->bindParam(":tp", $tp);
    $stmt->bindParam(":quan", $quan);
    $stmt->bindParam(":diachichitiet", $diachichitiet);
    $stmt->bindParam(":matk", $matk);

    // Execute the prepared statement
    return $stmt->execute();
}

function delete_diachi($madc){
    global $conn;
    $conn = data();
    $sql = "DELETE FROM diachi WHERE madc=:madc";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":madc", $madc);
    return $stmt->execute();
}

?>
