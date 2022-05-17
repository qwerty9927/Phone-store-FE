<?php
    require_once("./DB.php");
    $db = new DB();
    $sql = "SELECT * FROM SANPHAM WHERE TenThuongHieu = '{$_POST['access']}' LIMIT {$_POST['startPoint']}, 8";
    echo json_encode($db->select($sql));
?>