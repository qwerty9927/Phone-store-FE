<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assests/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Document</title>
</head>
<body>
  <?php
    session_start();
    require_once("./DB.php");
    // require_once("./Shopping_Cart/php/xuly.php");
    $db = new DB();
  ?>
  <div class="header">
    <div class="container">
      <ul> 
          <li><a href="sdfsd"><img style="width: 198px;" src="./assests/img/logocellphones.png" alt="logo"></a></li>
          <div class="dropdown">
              <button class="dropbtn">Địa điểm</button>
              <div class="dropdown-content">
              <a href="#">TP.HCM</a>
              <a href="#">Hà Nội</a>
              </div>
          </div>
          <li>
            <input type="text" placeholder="Bạn cần tìm gì?"><i class="fa-solid fa-magnifying-glass"></i></li>
          <li>
            <a href="">
              <button>
                <i class="fa-solid fa-mobile"></i> 
                Gọi mua hàng <br> <b>1800.2097</b>
              </button>
            </a>
          </li>
          <li>
            <a href="">
              <button><i class="fa-solid fa-location-dot"></i>
              Cửa hàng <br> gần bạn
              </button>
            </a>
          </li>
          <li>
          <?php if(isset($_SESSION['Username_user'])){
            $url = './Shopping_Cart/cart.php'; 
          }else {
            $url = './login.php';
          }?>
            <a href="<?php echo $url?>">
              <button>
                <i class="fa-solid fa-cart-shopping"></i>
                Giỏ hàng
                <?php
                  if( isset($_SESSION["cart"])){
                    $count=count($_SESSION["cart"]);
                    echo "<span id=\"cart_count\" class=\"text-warning bg light\" style=\"color: yellowgreen\">$count</span> ";
                  }
                  else{
                    echo "<span id=\"cart_count\" class=\"text-warning bg light\" style=\"color: yellowgreen\">0</span> ";
                  }
                  ?>
              </button>
            </a>
          </li>
          <li>
            <a href="login.php">
              <button>
                <i class="fa-solid fa-id-card"></i>
                Smember
              </button>
            </a>
          </li>
      </ul>
    </div>
  </div>
  <div class="menu">
    <ul>
      <li><a href="./?key=apple">Apple</a></li>
      <li><a href="./?key=samsung">Samsung</a></li>
      <li><a href="./?key=xiaomi">Xiaomi</a></li>
      <li><a href="./?key=oppo">Oppo</a></li>
      <li><a href="./?key=nokia">Nokia</a></li>
    </ul>
  </div>
  <div class="container">
    <div class="header_container">
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="./assests/img/poster.png" style="width:100%">
          <div class="text"></div>
        </div>
      
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="./assests/img/poster(1).png" style="width:100%">
          <div class="text"></div>
        </div>
      
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="./assests/img/poster(2).png" style="width:100%">
          <div class="text"></div>
        </div>
      
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>
      
      <!-- The dots/circles -->
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
    </div>
    <div class="main_container">
      <div class="bottom_main">
        <div class="title_top">
          <div class="title">
            <h2>San pham</h2>
          </div>
        </div>
        <div class='list_items'>
          
        </div>
        <div class="page">
          <ul>
            <?php
              if(isset($_GET['key'])){
                $page_count = ceil(count($db->select("SELECT * FROM SANPHAM WHERE TenThuongHieu = '{$_GET['key']}'"))/8);
                if($page_count > 1){
                  for($i=1;$i<=$page_count;$i++){
                    echo "<li onclick=\"renderProduct('{$_GET['key']}', $i)\">$i</li>";
                  }
                }
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer" style="padding: 32px 0; background-color: #ccc">
    <div class="container">
      <div class="Content">    
        <ul>    
          <li class="Find store">
              <p><strong>Tìm cửa hàng</strong></p>
              <p><a href="">Tìm cửa hàng gần nhất</a></p>
              <p><a href="">Mua hàng từ xa</a></p>
              <p><a href="" style="font-size: 13px; color: red">Gặp trực tiếp cửa hàng gần nhất hoặc gọi điện</a></p>                       
          </li>
        </ul>        
      </div>
      <div class="Contact">
        <ul>
          <li>
            <p><strong>Liên hệ với chúng tôi</strong></p>
            <p><a href="">Gọi mua hàng:<b>18002097</b> (8h00-22h00)</a></p>
            <p><a href="">Gọi khiếu nại:<b>18002063</b> (8h00-21h30)</a></p>
            <p><a href="">Gọi bảo hành:<b>18002064</b> (8h00-21h00)</a></p>
          </li>
        </ul>
      </div>   
      <div class="Care-Service">
        <ul>
          <li>
            <p><strong>Đối tác dịch vụ bảo hành</strong></p>
            <p><a href="">Mua hàng và thanh toán online</a></p>
            <p><a href="">Mua hàng và trả góp online</a></p>
            <p><a href="">Tra thông tin đơn hàng</a></p>
            <p><a href="">Tra điểm Smember</a></p>
            <p><a href="">Tra thông tin bảo hành</a></p>
            <p><a href="">Tra cứu hóa đơn điện tử</a></p>
            <p><a href="">Trung tâm bảo hành chính hãng</a></p>
            <p><a href="">Quy định về việc sao lưu dữ liệu</a></p>
            <p><a href="">Dịch vụ bảo hành điện thoại</a></p>
          </li>
        </ul>
      </div>
      <div class="Care-Service-two">
        <ul>    
          <li>
            <p><a href="">Quy chế hoạt động</a></p>
            <p><a href="">Chính sách Bảo hành</a></p>
            <p><a href="">Liên hệ hợp tác kinh doanh</a></p>
            <p><a href="">Đơn doanh nghiệp</a></p>
            <p><a href="" style="font-size: 13px; color: red">Ưu đãi từ đối tác</a></p>
            <p><a href="" style="font-size: 13px; color: red">Tuyển dụng</a></p>
          </li>
        </ul>
      </div>  
  </div>
<script src="./assests/js/script.js"></script>
</body>
</html>

<?php
  if(isset($_GET['key'])){
    echo "<script>renderProduct('{$_GET['key']}', 1)</script>";
  } else {
    echo "<script>renderProduct('apple', 1)</script>";
  }
?>