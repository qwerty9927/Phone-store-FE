<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assests/css/form.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>     
<body>      
	<div class="container py-4 h-100">
		<div class="row justify-content-center align-items-center h-100">
			<div class="col-12 col-lg-7 col-xl-5">
				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
					<div class="card-body p-4 p-md-4">
						<h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>

							<div class="row">
								<div class="col-md-12 mb-2">
									<div class="form-outline userbox">
									<label for=""></i>Tên đăng nhập:</label>
									<input type="text" name="username" class="form-control form-control-lg">
									<div>
										<span></span>
									</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12 mb-2">
									<div class="form-outline userbox">
										<label for=""></i>Mật khẩu:</label>
										<input type="password" name="password" class="form-control form-control-lg">
										<div>
											<span></span>
										</div>
									</div>
								</div>
							</div>

							<div class="pt-2">
								<input class="btn btn-primary btn-lg" type="submit" value="Sign up" onclick="kiemtra()" />
							</div>
						<div class="">Bạn chưa có tài khoản ! <a href="resgister.php">Đăng ký</a></div>
					</div>
				</div>
			</div>
		</div>
  </div>
<script src="./assests/js/scriptLogin.js"></script>
</body>
</html>