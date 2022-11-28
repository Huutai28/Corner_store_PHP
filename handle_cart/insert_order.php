<?php
include "../admin/handle/database.php";
session_start();
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con ,$_POST['name']);
    $phone = mysqli_real_escape_string($con ,$_POST['phone']);
    $province = mysqli_real_escape_string($con ,$_POST['province']);
    $district = mysqli_real_escape_string($con ,$_POST['district']);
    $ward = mysqli_real_escape_string($con ,$_POST['ward']);
    $address = mysqli_real_escape_string($con ,$_POST['address']);
    
    $email = mysqli_real_escape_string($con ,$_POST['email']);
    $created_at = date('d/m/Y H:i:s');

    $result_province = $con->query("SELECT `name` FROM `tinhthanhpho` WHERE `matp` = '{$province}'");
    $pro = $result_province->fetch_assoc();
    $name_province = $pro['name'];

    $result_district = $con->query("SELECT `name` FROM `quanhuyen` WHERE `maqh` = '{$district}'");
    $dis = $result_district->fetch_assoc();
    $name_district = $dis['name'];

    $result_ward = $con->query("SELECT `name` FROM `xaphuongthitran` WHERE `xaid` = '{$ward}'");
    $wa = $result_ward->fetch_assoc();
    $name_ward = $wa['name'];

    $full_address = $address .", ". $name_ward .", ". $name_district .", ". $name_province;
    if (!empty($_SESSION["cart"])) {
        $products = "SELECT `product_id`, `product_price` FROM `products` WHERE `product_id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")";
        $result_products = $con->query($products);
        $total = 0;
        $orderProducts = array();
        while ($product = mysqli_fetch_array($result_products)) {
            $orderProducts[] = $product;
            $total += $product['product_price'] * $_SESSION['cart'][$product['product_id']];
        }
        $order = "INSERT INTO `orders`(`order_name`, `order_phone`, `order_address`, `order_email`, `order_total`, `created_at`) VALUES ('{$name}','{$phone}','{$full_address}','{$email}','{$total}','{$created_at}')";
        if ($con->query($order) === TRUE) {
            $order_id = $con->insert_id;
            $insertString = "";
            foreach ($orderProducts as $key => $product) {
                $insertString .= "('{$order_id}', '{$product['product_id']}', '{$_SESSION['cart'][$product['product_id']]}', '{$product['product_price']}', '{$created_at}')";
                if ($key != count($orderProducts) - 1) {
                    $insertString .= ",";
                }
            }
            $order_detail = "INSERT INTO `order_detail`(`order_detail_order_id`, `order_detail_product_id`, `order_detail_quantity`, `order_detail_price`, `created_at`) VALUES " . $insertString ;
            if ($con->query($order_detail) === TRUE) {
                unset($_SESSION['cart']);
                $response = [
                 'style' => 'success',
                 'message' => 'Cảm quý khách đã đặt hàng, chúng tôi sẽ liên hệ xác nhận đơn hàng trong thời gian sớm nhất!',
                 ];
                 echo json_encode($response);
             }     
        }  
    }else{
        $response = [
            'style' => 'info',
            'message' => 'Giỏ hàng trống!',
        ];
        echo json_encode($response);
    }
}
?>