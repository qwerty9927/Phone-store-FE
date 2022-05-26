let checkAccount = 1
function checkusername(value){
	$.ajax({
		method:'POST',
		url:"http://localhost/client/checkUsername.php",
		data:{
			value:value
		}
	}).done(function(check){
		let result = JSON.parse(check)
		console.log (result);
		if(result == false){
			$('.resgister input[name = "username"] + div span').text("Tài khoản đã tồn tại")
			$('.resgister input[name = "username"]').focus()
			checkAccount = 0
		} else {
			checkAccount = 1
		}
	})
}
function kiemtra(){
	if(!/[a-zvxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđA-Z][a-zvxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđA-Z0-9-_ ]{1,24}/.test($('.resgister input[name = "tentk"]').val())){
		$('.resgister input[name = "tentk"] + div span').text("Họ tên không thuộc khoảng 4 - 24 hay không lợp lệ")
		$('.resgister input[name = "tentk"]').focus()
		return false
	} else {
		$('.resgister input[name = "tentk"] + div span').text("")
	}
	if(!/[a-zA-Z0-9][a-zA-Z0-9-_ ]{1,24}/.test($('.resgister input[name = "username"]').val())){
		$('.resgister input[name = "username"] + div span').text("Username không thuộc khoảng 1 - 24 hay không lợp lệ")
		$('.resgister input[name = "username"]').focus()
		return false
	} else {
		$('.resgister input[name = "username"] + div span').text("")
		if(checkAccount == 0){
			$('.resgister input[name = "username"] + div span').text("Tài khoản đã tồn tại")
			$('.resgister input[name = "username"]').focus()
			return false
		}
	}
	if(!/[a-zA-Z0-9][a-zA-Z0-9-_ ]{7,24}/.test($('.resgister input[name = "pass1"]').val())){
		$('.resgister input[name = "pass1"] + div span').text("Password cần lớn hơn 8")
		$('.resgister input[name = "pass1"]').focus()
		return false
	} else {
		$('.resgister input[name = "pass1"] + div span').text("")
	}
	if($('.resgister input[name = "pass1"]').val() != $('.resgister input[name = "pass2"]').val()){
		$('.resgister input[name = "pass2"] + div span').text("Re Password khong trung")
		$('.resgister input[name = "pass2"]').focus()
		return false
	} else {
		$('.resgister input[name = "pass2"] + div span').text("")
	}
	
	if(!/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test($('.resgister input[name = "sdt"]').val())){
		$('.resgister input[name = "sdt"] + div span').text("Số điện thoại không hợp lệ")
		$('.resgister input[name = "sdt"]').focus()
		return false
	} else {
		$('.resgister input[name = "sdt"] + div span').text("")
	}
	if(!/[a-zA-Z][a-zA-Z0-9-_/]{1,24}/.test($('.resgister input[name = "diachi"]').val())){
		$('.resgister input[name = "diachi"] + div span').text("Địa chỉ không hợp lệ")
		$('.resgister input[name = "diachi"]').focus()
		return false
	} else {
		$('.resgister input[name = "diachi"] + div span').text("")
	}
	if(!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test($('.resgister input[name = "email"]').val())){
		$('.resgister input[name = "email"] + div span').text("Email không hợp lệ")
		$('.resgister input[name = "email"]').focus()
		return false
	} else {
		$('.resgister input[name = "email"] + div span').text("")
	}
	return true
}