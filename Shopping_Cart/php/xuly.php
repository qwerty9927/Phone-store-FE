<?php
    //them sp vao gio hang
    if (isset($_GET["action"])){
        
        if($_GET["action"] == "add"){
            require_once("./DB.php");
            $db = new DB();
            $row = $db->select("SELECT * FROM SANPHAM WHERE idCD = {$_GET['id']}");
            if(isset($_SESSION["cart"])){
                $item_array_id = array_column($_SESSION["cart"], "idCD");
                if(!in_array($_GET["id"],$item_array_id)){
                    $count = count($_SESSION["cart"]);
                    $item_array = array(
                        'idCD' => $_GET["id"],
                        'TenCD' => $row[0]['TenCD'],
                        'Gia' => $row[0]['Gia'],
                        'SL' => $_GET['quantity'],
                        'urlHinh' => $row[0]['urlHinh'],
                        'TenThuongHieu' => $row[0]['TenThuongHieu'],
                    );
                    $_SESSION["cart"][$count] = $item_array;
                    if(isset($_GET['active'])){
                        session_start();
                        if(isset($_SESSION['Username_user'])){
                            header("Location: http://localhost/client/Shopping_Cart/index.php");
                        } else {
                            header("Location: http://localhost/client/login.php");
                        }
                    } else {
                        echo "<script>window.location='?id={$_GET['id']}'</script>";
                    }
                }else{
                    echo '<script>alert("Sản phẩm đã tồn tại")</script>';
                    echo "<script>window.location='?id={$_GET['id']}'</script>";
                }
            }
            else{
                $item_array = array(
                    'idCD' => $_GET["id"],
                    'TenCD' => $row[0]['TenCD'],
                    'Gia' => $row[0]['Gia'],
                    'SL' => $_GET['quantity'],
                    'urlHinh' => $row[0]['urlHinh'],
                    'TenThuongHieu' => $row[0]['TenThuongHieu'],
                );
                $_SESSION["cart"][0] = $item_array;
            }
        }
        
    }

    //xoa sp
    if (isset($_GET["action"])){
        if ($_GET["action"] == "remove"){
            require_once("../DB.php");
            $db = new DB();
            foreach($_SESSION["cart"] as $keys => $value ){
                if ($value["idCD"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>window.location = "./index.php"</script>';   
                }
            }
        }
    }
?>