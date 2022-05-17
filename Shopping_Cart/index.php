<?php
    //Start session
    session_start();
    require_once("./php/connection.php");
    require_once("./php/xuly.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boottrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css-->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        require_once("./php/header.php");
    ?>

    <div class="container">
        <div class="row text-center py-5">
        <?php
            $query = "SELECT * FROM  sanpham ORDER BY  idCD ASC";
            $result = mysqli_query($con,$query);
            if ( mysqli_num_rows($result)>0){
                while ( $row = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-md-3">
                        <form method="POST" action="index.php?action&id=<?php echo $row["idCD"]?>">
                            <div class="product">
                                <img src="<?php echo ("../assests/img/{$row['TenThuongHieu']}/{$row["urlHinh"]}") ?>" class="img-fluid card-img-top">
                                <div class="card-body">
                                    <h5 class="text-info"><?php echo $row["TenCD"]; ?></h5>
                                    <h5>
                                    <small> <s class="text-secondary"><?php echo intval($row["Gia"]) + 1000000; ?></s> </small>
                                    <span class="price"><?php echo $row["Gia"]; ?></span>
                                    </h5>
                                </div>
                                <span>Số lượng : <input type="text" name="quantity" class="form-control" value="0"></span>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["TenCD"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["Gia"]; ?>">
                                <input type="hidden" name="hidden_id" value="">
                                <button type="submit" class="btn btn-warning my-3" name="add">Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i></button>
                            </div>                        
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
         </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>