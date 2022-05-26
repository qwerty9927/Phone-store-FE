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
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-input-spinner@1.9.7/src/bootstrap-input-spinner.js"></script>
</head>
<body>
    <?php
        session_start();
        require_once(".././DB.php");
        if(!isset($_SESSION['Username_user'])){
            header("Location: http://localhost/client/");
        }
        $db = new DB();
    ?>
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #e0042a">
        <a href="http://localhost/client" class="navbar-brand">
            <img src=".././assests/img/logocellphones.png" alt="" style="height: 50px">
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
                    <h2>Thông tin khách hàng</h2>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                                <th>Họ Tên</th>
                                <td><?php echo $_SESSION['Ten']?></td>
                        </tr>
                        <tr>
                                <th>Số Điện Thoại</th>
                                <td><?php echo $_SESSION['SDT']?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td><?php echo $_SESSION['DiaChi']?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $_SESSION['Email']?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</div>
<div class="container-fluid">
        <div class="row px-5">
            <div class="col">
                <div class="shopping_cart">
                    <h2>Đơn hàng đã đặt</h2>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <th>Mã Hóa Đơn</th>
                            <th>Ngày đặt</th>
                            <th>Ngày dự kiến nhận</th>
                            <th>Địa chỉ nhận hàng</th>
                            <th>Tình trạng đơn hàng</th>    
                            <th>Hủy</th>
                        </tr>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM DONHANG WHERE Makh = {$_SESSION['Makh']} AND TrangThai = 1";
                                $arrResult = $db->select($sql);
                                foreach($arrResult as $keys=>$value){
                            ?>
                                    
                                    <tr>
                                        <td>
                                            <a href="./chitiethoadon.php/?id=<?php echo $value['idHD']?>"><i><?php echo $value['idHD']?></i>
                                        </td>
                                        <td>
                                            <?php echo $value['ThoiDiemDatHang']?>
                                        </td>
                                        <td>
                                            <?php echo $value['ThoiDiemGiaoHang']?>
                                        </td>
                                        <td>
                                            <?php echo $value['DiaDiemGiaoHang']?>
                                        </td>
                                        <td>
                                            <?php
                                                if($value['XuLy'] == 1){
                                                    echo "Đã xử lý";
                                                }else {
                                                    echo "Chưa xử lý";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($value['XuLy'] == 1){
                                                    echo "";
                                                }else {
                                                    echo "<a href=\"./handleData.php/?action=destroy&id={$value['idHD']}\"><button class=\"btn btn-danger mx-2\">Hủy</button></a>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</body>
</html>
