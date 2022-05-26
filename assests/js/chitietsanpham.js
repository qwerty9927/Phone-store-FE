$("input[type='number']").inputSpinner()

function updateQuantity(obj, id){
  if($('.addToCart').hasClass('activeCart')){
    document.querySelector(".activeCart").href = `?action=add&id=${id}&quantity=${obj.value}`
    console.log(obj.value)
  }

  if($('.payMent').hasClass('activePayMent')){
    document.querySelector(".payMent").href = `?action=add&id=${id}&quantity=${obj.value}&active`
    console.log(obj.value)
  }
}
