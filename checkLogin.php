<?php
    session_start();
    require_once("DB.php");
    $db = new DB();
		$_POST['password'] = md5($_POST['password']);
    $sql = "Select * from taikhoan where Username='{$_POST['username']}' and Password = '{$_POST['password']}'";
    $result = $db->select($sql);
    if(count($result) > 0){
        $_SESSION["Username_user"] = $result[0]['Username'];
        echo json_encode(true);
    }else{
        echo json_encode(false);
    }
?>