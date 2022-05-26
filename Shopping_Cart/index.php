<?php
    session_start();
    require_once("./php/header.php");
    require_once("./php/xuly.php");
    require_once("../DB.php");
    if(!isset($_SESSION['Username_user'])){
        header("Location: http://localhost/client/");
    }
    $db = new DB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boottrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css-->
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.9.7/src/bootstrap-input-spinner.js"></script>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-8">
                <div class="shopping_cart">
                    <h6>Giỏ Hàng của bạn</h6>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <th width="15%">Image</th>
                            <th width="15%">Product Name</th>
                            <th width="20%" class="quantityInCart">Quantity</th>
                            <th width="15%">Price Details</th>
                            <th width="15%">Total Price</th>
                            <th width="10%">Remove Item</th>
                        </tr>

                        <?php 
                            if(!empty($_SESSION["cart"])){
                                $total = 0 ;
                                foreach($_SESSION["cart"] as $keys => $value){
                                    ?>
                                    <tr>
                                        <td><img src="../assests/img/<?php echo ($value["TenThuongHieu"]."/".$value["urlHinh"]); ?>" alt=""> </td>
                                        <td><?php echo $value["TenCD"]; ?></td>
                                        <td><?php echo $value["SL"]; ?></td>
                                        <td><?php echo $value["Gia"]; ?></td>
                                        <td>
                                            <?php 
                                                $total = $total + ($value["SL"]*$value["Gia"]);
                                                $_SESSION['cart'][$keys]['Gia'] = $value["Gia"];
                                                $_SESSION['cart'][$keys]['total'] = $value["SL"]*$value["Gia"];
                                                echo ($_SESSION['cart'][$keys]['total'])
                                            ?>
                                        </td>
                                        <td>
                                            <a href="?action=remove&id=<?php echo $value["idCD"] ?>" class="cart-items">
                                                <button type="submit" class="btn btn-danger mx-2" name="remove">Xóa</button>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <td colspan="4" align="right">Total</td>
                                <td><?php $_SESSION['total'] = $total;echo $total?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <h6>Thanh toán</h6>
                <form action="./handleData.php" method="POST" onsubmit="return kiemtra()">
                    <div class="info">
                        <div class="form-group">
                            <label>Họ Tên</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['Ten']?>">
                            <div>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" placeholder="273 An Dương Vương P3,Q5" value="<?php echo $_SESSION['DiaChi']?>">
                            <div>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>SDT</label>
                            <input type="text" class="form-control" name="phoneNumber" value="<?php echo $_SESSION['SDT']?>">
                            <div>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['Email']?>">
                            <div>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Tôi cam kết thông tin trên là đúng sự thật
                                </label>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary">Thanh toán</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>   
            
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="./js/scriptCart.js"></script>
</body>
</html>