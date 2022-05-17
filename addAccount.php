<?php
	require_once('./DB.php');
	$db = new DB();
	$tendn = $_POST['username'];
	$tentk = $_POST['tentk'];
	$password = $_POST['pass1'];
	$repassword = $_POST['pass2'];

	$password = md5($password);
	$s ="Select * from taikhoan order by MATK DESC limit 1";
	$up = mysqli_fetch_assoc(mysqli_query($db->conn,$s))['MATK']+1;
			
	$sql ="Insert into taikhoan (MATK,TENTK,Username, Password, MAQUYEN, TrangThai) values ('$up','$tentk','$tendn', '$password','KH', 1)";
	if(mysqli_query($db->conn,$sql)){
		$_SESSION['username'] = $tendn;
		header("Location: http://localhost/client/index.php");
	}
?>
