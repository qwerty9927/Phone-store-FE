<?php
  require_once('./DB.php');
  $db = new DB();
  echo json_encode($db->select("SELECT * FROM SANPHAM"));
?>