<?php
  //Ghi vao table khach hang
  require_once('../DB.php');
  session_start();
  $db = new DB();
  if(isset($_POST['name']) && isset($_SESSION['cart'])){
    echo "<script>Đặt hàng thành công</script>";
    //Ghi vao hoa don
    $nextCode = intval($db->select("SELECT * FROM DONHANG ORDER BY idHD DESC LIMIT 1")[0]['idHD']) + 1;
    $arr = array(
      "idHD"=>$nextCode,
      "ThoiDiemDatHang"=>date("Y-m-d", time()),
      "ThoiDiemGiaoHang"=>date("Y-m-d", (time() + 3600 * 72)),
      "TenNguoiNhan"=>"{$_POST['name']}",
      "DiaDiemGiaoHang"=>"{$_POST['address']}",
      "Email"=>"{$_POST['email']}",
      "SDT"=>"{$_POST['phoneNumber']}",
      "TongTien"=>$_SESSION['total'],
      "TrangThai"=>1,
      "XuLy"=>0,
      "Manv"=>$_SESSION['Manv'],
      "Makh"=>$_SESSION['Makh'],
    );
    $db->insert('DONHANG', $arr);

    //Ghi vao chi tiet hoa don
    foreach($_SESSION['cart'] as $keys=>$value){
      $arr = array(
        "idHD"=>$nextCode,
        "idCD"=>$value['idCD'],
        "TenSP"=>$value['TenCD'],
        "SoLuongSP"=>$value['SL'],
        "Gia"=>$_SESSION['cart'][$keys]['Gia'],
        "TongTien"=>$_SESSION['cart'][$keys]['total'],
      );
      $db->insert('CHITIETDONHANG', $arr);
    }
    unset($_SESSION['cart']);
    header('Location: http://localhost/client/Shopping_Cart/lichsudathang.php');
  } else {
    echo "<script>alert('Vui long chon mua san pham')</script>";
    echo "<script>window.location='http://localhost/client'</script>";
  }

  if(isset($_GET['action'])){
    $db->update("DONHANG", array("TrangThai"=>0), "idHD = {$_GET['id']}");
    header("Location: http://localhost/client/Shopping_Cart/lichsudathang.php");
  }
?>