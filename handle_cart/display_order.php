<?php
include "../admin/handle/database.php";
session_start();
if (isset($_POST['displayData'])) {
    if (!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
    }

    if (!empty($_SESSION["cart"])) {
        $products = "SELECT * FROM `products` WHERE `product_id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")";
        $result_products = $con->query($products);
        $total = 0;
        if ($result_products->num_rows > 0) {
            while ($row = $result_products->fetch_assoc()) {
                $name = $row['product_name'];
                $quantity = $_SESSION['cart'][$row['product_id']];
                $price = $quantity * $row['product_price'];
                $total += $price; 
                echo $ul = '<li>'.$name.' <i>-số lượng x'.$quantity.'</i> <span>'. number_format($price).' VNĐ</span></li>';
            }
        }
        echo  '<li>Tổng cộng <i>-</i> <span>'. number_format($total).' VNĐ</span></li>';
    }
}
?>

