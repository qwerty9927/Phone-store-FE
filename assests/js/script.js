let arrProduct

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function renderProduct(access, page){
  let startPoint = (page - 1) * 8
  $(document).ready(function(){
    $.ajax({
      method: "POST",
      url : "./dividePage.php",
      data: {
        access: access,
        startPoint: startPoint
      }
    }).done(function (response){
      let result = JSON.parse(response)
      console.log(result)
      arrProduct = result
      let string = result.map(item => {
        return `
        <a style="font-size: 20px;" href="./chitietsanpham.php/?id=${item.idCD}" class='product-name'>
          <div class='product-item'>
            <div class='icon-installmemt'></div>
            <div class='product-top'>
                <img class='product-thumb' src='./assests/img/${access}/${item.urlHinh}'>
                <span>${item.TenCD}<span>
            </div>
            <div class='product-info'>
              <div class='product-price'>${item.Gia} VND</div>
              <a href="./chitietsanpham.php/?action=add&id=${item.idCD}&quantity=1&active" class='buy-now'>Mua ngay</a>
            </div>
          </div> 
        </a>
        `
      })
      $('.list_items').html(string)
    })
  })
}

function search(page){
  $(document).ready(function(){
    $.ajax({
      method: "POST",
      url : "./callData.php",
    }).done(function (response){
      let result = JSON.parse(response)
      let search_char = $('#search_box').val()
      let i = 0
      let startPoint = ((page - 1) * 8)
      let endPoint = page * 8
      let resultFilter = result.filter(item => {
        if(item.TenCD.toLowerCase().startsWith(search_char) && i >= startPoint && i < endPoint){
          i++
          return item
        } else if(i != startPoint) {
          i++
        }
      })
      let string = resultFilter.map(item => {
        return `
        <a style="font-size: 20px;" href="./chitietsanpham.php/?id=${item.idCD}" class='product-name'>
          <div class='product-item'>
            <div class='icon-installmemt'></div>
            <div class='product-top'>
                <img class='product-thumb' src='./assests/img/${item.TenThuongHieu}/${item.urlHinh}'>
                <span>${item.TenCD}<span>
            </div>
            <div class='product-info'>
              <div class='product-price'>${item.Gia} VND</div>
              <a href="./chitietsanpham.php/?action=add&id=${item.idCD}&quantity=1&active" class='buy-now'>Mua ngay</a>
            </div>
          </div> 
        </a>
        `
      })
      let stringPage = ""
      let countRow = Math.ceil(resultFilter.length/8)
      console.log(resultFilter.length)
      console.log(countRow)
      if(countRow >= 1){
        for(let i = 0;i <= countRow;i++){
          stringPage += `<li onclick="search(${i + 1})">${i + 1}</li>`
        }
      }
      $('.list_items').html(string)
      $('.page ul').html(stringPage)
    })
  })
}
