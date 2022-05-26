<?php
    session_start();
    require_once("DB.php");
    $db = new DB();
		$_POST['password'] = md5($_POST['password']);
    $sql = "Select * from taikhoan where Username='{$_POST['username']}' and Password = '{$_POST['password']}'";
    $result = $db->select($sql);
    if(count($result) > 0){
        $customer = $db->select("SELECT * FROM KHACHHANG WHERE MATK = {$result[0]['MATK']}")[0];
        $_SESSION["Username_user"] = $result[0]['Username'];
        $_SESSION["MATK"] = $result[0]['MATK'];
        $_SESSION["Makh"] = $customer['Makh'];
        $_SESSION["Ten"] = $customer['Ten'];
        $_SESSION["DiaChi"] = $customer['DiaChi'];
        $_SESSION["SDT"] = $customer['SDT'];
        $_SESSION["Email"] = $customer['Email'];
        echo json_encode(true);
    }else{
        echo json_encode(false);
    }
?>