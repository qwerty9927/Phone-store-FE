<?php
    include "DB.php";
    $db = new DB();
    $sql = "Select Username from taikhoan where Username='{$_POST['value']}'";
   
    if(count($db->select($sql)) > 0){
        echo json_encode(false);
    }else{
        echo json_encode(true);
    }
?>