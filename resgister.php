<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assests/css/form.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Document</title>
</head>
<body>
	<div class="login-box resgister">
		<div><h1>Register</h1></div>
		<form action="addAccount.php" method="POST" onsubmit="return kiemtra()">  
			<div class="register-box">
				<label for="">Tên tài khoản</label>
				<input type="text" name="tentk" id="hoten">
				<div>
					<span></span>
				</div>
			</div>
			<div class="register-box">
				<label for=""></i>Tên đăng nhập:</label>
				<input type="text" name="username" onchange="checkusername(this.value)">
				<div>
					<span></span>
				</div>
			</div>
			<div class="register-box">
				<label for=""></i>Mật khẩu:</label>
				<input type="password" name="pass1" id = "mk1">
				<div>
					<span></span>
				</div>
			</div>
			<div class="register-box">
				<label for=""></i>Xác nhận mật khẩu:</label>
				<input type="password" name="pass2" id = "mk2">
				<div>
					<span></span>
				</div>
			</div>
			<div class="btn" name="dangky"><button type="submit">Đăng ký</button></div>
			<div class="foot">Bạn đã có tài khoản ! <a href="login.php">Đăng nhập</a></div>
		</form>
	</div>
<script src="./assests/js/scriptResgister.js"></script>
</body>
</html>