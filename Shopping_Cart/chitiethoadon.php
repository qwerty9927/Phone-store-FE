<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng </title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boottrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.9.7/src/bootstrap-input-spinner.js"></script>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['Username_user'])){
            header("Location: http://localhost/client/");
        }
    ?>
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #e0042a">
        <a href="http://localhost/client" class="navbar-brand">
            <img src="../../assests/img/logocellphones.png" alt="" style="height: 50px">
        </a>
        <button class="navbar-toggler" type="button" 
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigaiton"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</header>
<div class="container-fluid">
        <div class="row px-5">
            <div class="col">
                <div class="shopping_cart">
                    <h2>Đơn hàng đã đặt</h2>
                    <hr>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Mã Hóa Đơn</th>
                            <th colspan="12">
                                <?php
                                    if(isset($_GET['id'])){
                                        echo $_GET['id'];
                                    }
                                ?>
                            </th>
                        </tr>
                        <tr>
                            <th width="20%">Tên Sản Phẩm</th>
                            <th width="10%" class="quantityInCart">Số lượng</th>
                            <th width="15%">Đơn Giá</th>
                            <th width="15%">Tổng tiền</th>
                        </tr>
                        <?php
                        require_once(".././DB.php");
                        $db = new DB();
                        if(isset($_GET['id'])){
                            $arrResult = $db->select("SELECT * FROM CHITIETDONHANG WHERE idHD = {$_GET['id']}");
                            foreach($arrResult as $keys=>$value){
                        ?>
                        <tr>
                            <td><?php echo $value['TenSP']?></td>
                            <td><?php echo $value['SoLuongSP']?></td>
                            <td><?php echo $value['Gia']?></td>
                            <td><?php echo $value['TongTien']?></td>
                        </tr>
                        <?php
                            }
                        }
                       
                        ?>
                        
                    </table>
                </div>
            </div>
        </div>
</div>
</body>
</html>
