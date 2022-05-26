<?php
	session_start();
	require_once('./DB.php');
	$db = new DB();
	$tendn = $_POST['username'];
	$tentk = $_POST['tentk'];
	$password = $_POST['pass1'];
	$repassword = $_POST['pass2'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];

	$password = md5($password);
	$s ="Select * from taikhoan order by MATK DESC limit 1";
	$up = mysqli_fetch_assoc(mysqli_query($db->conn,$s))['MATK']+1;
			
	$sql ="Insert into taikhoan (MATK,TENTK,Username, Password, MAQUYEN, TrangThai) values ('$up','$tentk','$tendn', '$password','KH', 1)";
	if(mysqli_query($db->conn,$sql)){
		$customer = $db->select("SELECT * FROM KHACHHANG ORDER BY Makh DESC LIMIT 1")[0];
    $arr = array(
			"Makh"=>intval($customer['Makh']) + 1,
			"Ten"=>$tentk,
			"DiaChi"=>$diachi,
			"SDT"=>$sdt,
			"Email"=>$email,
			"TrangThai"=>1,
			"MATK"=>$up,
		);
		$db->insert('KHACHHANG', $arr);
		$_SESSION["Username_user"] = $tendn;
		$_SESSION["MATK"] = $up;
		$_SESSION["Makh"] = intval($customer['Makh']) + 1;
		$_SESSION["Ten"] = $tentk;
		$_SESSION["DiaChi"] = $diachi;
		$_SESSION["SDT"] = $sdt;
		$_SESSION["Email"] = $email;
		header("Location: http://localhost/client/index.php");
	}
?>
