// $('.quantityInCart').inputSpinner()
function kiemtra(){
	if(!/[a-zvxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđA-Z][a-zvxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđA-Z0-9-_ ]{1,24}/.test($('.info input[name = "name"]').val())){
		$('.info input[name = "name"] + div span').text("Họ tên không thuộc khoảng 1 - 24 hay không lợp lệ")
		$('.info input[name = "name"]').focus()
		return false
	} else {
		$('.info input[name = "name"] + div span').text("")
	}
	if(!/[a-zA-Z][a-zA-Z0-9-_/]{4,24}/.test($('.info input[name = "address"]').val())){
		$('.info input[name = "address"] + div span').text("Địa chỉ không hợp lệ")
		$('.info input[name = "address"]').focus()
		return false
	} else {
		$('.info input[name = "address"] + div span').text("")
	}
	if(!/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test($('.info input[name = "phoneNumber"]').val())){
		$('.info input[name = "phoneNumber"] + div span').text("Số điện thoại không hợp lệ")
		$('.info input[name = "phoneNumber"]').focus()
		return false
	} else {
		$('.info input[name = "phoneNumber"] + div span').text("")
	}
	if(!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test($('.info input[name = "email"]').val())){
		$('.info input[name = "email"] + div span').text("Email không hợp lệ")
		$('.info input[name = "email"]').focus()
		return false
	} else {
		$('.info input[name = "email"] + div span').text("")
	}
  console.log('connect')
  return true
}