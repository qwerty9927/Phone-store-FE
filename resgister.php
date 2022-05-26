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
<body style="display: flex;align-items: center;justify-content: center; height: 100vh">
  <div class="container py-4 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-4">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form action="addAccount.php" method="POST" onsubmit="return kiemtra()"> 

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline resgister">
                    <label for="">Tên tài khoản</label>
                    <input type="text" name="tentk" id="hoten" class="form-control form-control-lg">
                    <div>
                      <span></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline resgister">
                    <label for=""></i>Tên đăng nhập:</label>
                    <input type="text" name="username" onchange="checkusername(this.value)" class="form-control form-control-lg">
                    <div>
                      <span></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline resgister">
                    <label for=""></i>Mật khẩu:</label>
                    <input type="password" name="pass1" id = "mk1" class="form-control form-control-lg">
                    <div>
                      <span></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline resgister">
                    <label for=""></i>Xác nhận mật khẩu:</label>
                    <input type="password" name="pass2" id = "mk2" class="form-control form-control-lg">
                    <div>
                      <span></span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline resgister">
                    <label for=""></i>Số điện thoại:</label>
                    <input type="text" name="sdt" class="form-control form-control-lg">
                    <div>
                      <span></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline resgister">
                    <label for=""></i>Địa chỉ:</label>
                    <input type="text" name="diachi" class="form-control form-control-lg">
                    <div>
                      <span></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12 resgister">
                  <label for=""></i>Email:</label>
                  <input type="text" name="email" class="form-control form-control-lg">
                  <div>
                    <span></span>
                  </div>
                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Sign up" />
              </div>
            </form>
            <div class="">Bạn đã có tài khoản ! <a href="login.php">Đăng nhập</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="./assests/js/scriptResgister.js"></script>
</body>
</html>
