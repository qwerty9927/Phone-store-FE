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
    <div class="login-box">
			<div><h1>Login</h1></div>
			<div class="userbox">
				<label for=""></i>Tên đăng nhập:</label>
				<input type="text" name="username">
				<div>
					<span></span>
				</div>
			</div>
			<div class="userbox">
				<label for=""></i>Mật khẩu:</label>
				<input type="password" name="password">
				<div>
					<span></span>
				</div>
			</div>
			<div class="btn" name="btn1"><button onclick="kiemtra()">Đăng nhập</button></div>
			<div class="foot">Bạn chưa có tài khoản ? <a href="resgister.php">Đăng ký ngay !</a></div>
    </div>
		<script src="./assests/js/scriptLogin.js"></script>
</body>
</html>