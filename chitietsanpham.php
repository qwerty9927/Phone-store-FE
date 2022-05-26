<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../assests/css/chitietsanpham.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.9.7/src/bootstrap-input-spinner.js"></script>
  <title>Document</title>
</head>
<body>
<?php
    session_start();
    require_once("./Shopping_Cart/php/xuly.php");
    require_once("DB.php");
    $db = new DB();
    if(isset($_GET['id'])){
        $arrResult = $db->select("SELECT * FROM SANPHAM WHERE idCD = {$_GET['id']}");
    }

?>
  <div class="header">
      <div class="container">
            <ul> 
                <li><a href="../"><img style="width: 198px;" src="../assests/img/logocellphones.png" alt="logo"></a></li>
                <div class="dropdown">
                    <button class="dropbtn">Địa điểm</button>
                    <div class="dropdown-content">
                    <a href="#">TP.HCM</a>
                    <a href="#">Hà Nội</a>
                    </div>
                </div>
                <li>
                    <input type="text" placeholder="Bạn cần tìm gì?">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </li>
                <li>
                    <a href="">
                        <button><i class="fa-solid fa-mobile"></i> 
                        Gọi mua hàng <br> <b>1800.2097</b>
                    </button>
                    </a>
                </li>
                <li>
                    <a href="">
                        <button>
                            <i class="fa-solid fa-location-dot"></i>
                            Cửa hàng <br> gần bạn
                        </button>
                    </a>
                </li>
                <?php if(isset($_SESSION['Username_user'])){
                    $url = '../Shopping_Cart/index.php'; 
                }else {
                    $url = '../login.php';
                }?>
                <li>
                    <a href="<?php echo $url?>">
                        <button>
                            <i class="fa-solid fa-cart-shopping"></i>
                            Giỏ hàng
                            <?php
                            if( isset($_SESSION["cart"])){
                                $count=count($_SESSION["cart"]);
                                echo "<span id=\"cart_count\" class=\"text-warning bg light\">$count</span> ";
                            }
                            else{
                                echo "<span id=\"cart_count\" class=\"text-warning bg light\">0</span> ";
                            }
                         ?>
                        </button>
                    </a>
                </li>
                <li>
                    <?php
                        if(isset($_SESSION['Username_user'])){
                            echo "
                                <div class='drop_down_box'>
                                    <a href='logout.php' class='show_drop_down'>
                                        <button>
                                        <i class='fa-solid fa-id-card'></i>
                                        LogOut
                                        </button>
                                    </a>
                                    <div class='drop_down'>
                                        <a href='../Shopping_Cart/lichsudathang.php'>
                                        <button class='btn btn-danger mx-2' style='background-color: green;font-size: 12px!important;'>Xem lại đơn hàng</button>
                                        </a>
                                    </div>
                                </div>
                                ";
                        } else {
                            echo "<a href='login.php'>
                                    <button>
                                    <i class='fa-solid fa-id-card'></i>
                                    Smember
                                    </button>
                                </a>";
                        }
                    ?>
                </li>
            </ul>
        </div>
</div>    

<div class="detail-product">
    <div class="detail-product-box-name">
        <div class="container-1">
            <div class="box-name">
                <h2>Iphone 11 pro 128GB</h2>
            </div>
            <div class="stars">
                <form action="">
                    <input class="star star-5" id="star-5" type="radio" name="star"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star"/>
                    <label class="star star-1" for="star-1"></label>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <article class="col-sm-9">
            <div class="row">
                <div class="col-sm-5">
                    <img src="../assests/img/<?php echo $arrResult[0]['TenThuongHieu']?>/<?php echo $arrResult[0]['urlHinh']?>" style="width: 400px; margin-left: 50px" alt="">
                </div>
                <div class="col-sm-7">
                    <ul>
                        <li>Bộ nhớ trong: <?php echo $arrResult[0]['ROM']?></li>    
                        <li>Thương hiệu: <?php echo $arrResult[0]['TenThuongHieu']?></li>
                        <li>CPU: <?php echo $arrResult[0]['CPU']?></li>
                        <li>Hệ điều hành: IOS 13</li>
                        <li>RAM: <?php echo $arrResult[0]['RAM']?></li>
                        <li>Giá cũ: <a style="text-decoration: line-through; font-size: 16px"><?php echo (intval($arrResult[0]['Gia']) + 1000000)?>VND</a></li>
                        <li>Giá mới: <?php echo $arrResult[0]['Gia']?>VND</li>
                    </ul>
                    <div class="button-one">
                        <input type="number" value="1" min="1" max="<?php echo $arrResult[0]['SoLuongCD']?>" step="1" onchange="updateQuantity(this, <?php echo $arrResult[0]['idCD']?>)"/>
                    </div>
                    <div class="button-two"> 
                    <?php if(isset($_SESSION['Username_user'])){
                        $urlCart = "?action=add&id={$arrResult[0]['idCD']}&quantity=1"; 
                        $urlCartPayment = "?action=add&id={$arrResult[0]['idCD']}&quantity=1&active";
                        $classActiveCart = "activeCart";
                        $clssActivePayMent = "activePayMent";
                    }else {
                        $urlCart = '../login.php';
                        $urlCartPayment = '../login.php';
                        $classActiveCart = "";
                        $clssActivePayMent = "";
                    }?>
                        <a class="addToCart <?php echo $classActiveCart?>" href="<?php echo $urlCart?>">  
                            <button type="button" class="btn btn-outline-danger" style="width: 140px; height: 70px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg> Thêm vào giỏ hàng
                            </button>
                        </a> 
                        <a class="payMent <?php echo $clssActivePayMent?>" href="<?php echo $urlCartPayment?>">
                            <button type="button" class="btn btn-outline-danger" style="width: 140px; height: 70px; margin-left: 32px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                    <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                                </svg> Thanh toán ngay
                            </button>
                        </a>
                    </div>
                    <div class="button-three">
                        <button type="button" class="btn btn-outline-primary" style="width: 316px; height: 70px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg> Trả góp 0% (Nhận máy liền tay) 
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>

  <div class="footer">
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
</div>
  </div>
  <br>
  <script src="../assests/js/chitietsanpham.js"></script>
</body>
</html>