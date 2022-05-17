$("input[type='number']").inputSpinner()

function updateQuantity(obj, id){
  document.querySelector(".addToCart").href = `?action=add&id=${id}&quantity=${obj.value}`
  console.log(obj.value)
}
