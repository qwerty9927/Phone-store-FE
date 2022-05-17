function kiemtra(){
	if(!/[a-zA-Z0-9][a-zA-Z0-9-_ ]{1,24}/.test($('.userbox input[name = "username"]').val())){
		$('.userbox input[name = "username"] + div span').text("Username không thuộc khoảng 1 - 24 hay không lợp lệ")
		$('.userbox input[name = "username"]').focus()
		return false
	} else {
		$('.userbox input[name = "username"] + div span').text("")
	}
	if(!/[a-zA-Z0-9][a-zA-Z0-9-_ ]{7,24}/.test($('.userbox input[name = "password"]').val())){
		$('.userbox input[name = "password"] + div span').text("Password cần lớn hơn 8")
		$('.userbox input[name = "password"]').focus()
		return false
	} else {
		$('.userbox input[name = "password"] + div span').text("")
	}

	$.ajax({
		method:'POST',
		url:"http://localhost/client/checkLogin.php",
		data:{
			username: $('.userbox input[name = "username"]').val(),
      password: $('.userbox input[name = "password"]').val()
		}
	}).done(function(response){
		console.log(response)
		let result = JSON.parse(response)
		if(result == false){
      alert("Tài khoản hoặc mật khẩu không đúng")
		} else {
      window.location.href = "http://localhost/client/index.php"
    }
	})
}