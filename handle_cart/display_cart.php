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

    if ($result_products->num_rows > 0) {
        $i = 0;
        $table = '';
        while ($row = $result_products->fetch_assoc()) {
            $i++;
            $id = $row['product_id'];
            $name = $row['product_name'];
            $image = $row['product_image_path'];
            $quantity = $_SESSION['cart'][$row['product_id']];
            $price = number_format($row['product_price']);
            echo $table = '<tr class="rem1">
            <td class="invert">'.$i.'</td>
            <td class="invert-image"><a href="single?id='.$id.'"><img src="admin/uploads/'.$image.'" alt=" "
                        class="img-responsive"></a></td>
            <td class="invert">
                <div class="quantity">
                    <div class="quantity-select"> 
                        <input class="entry value" type="number" min="1" name="quantity['.$id.']" value="'.$quantity.'"/>
                    </div>
                </div>
            </td>
            <td class="invert">'.$name.'</td>

            <td class="invert">'.$price.' VNĐ</td>
            <td class="invert">
                <div class="rem">
                <button style="border:none" class="close1" value="'.$id.'"></button>
                </div>

            </td>
        </tr>';
        }
    }
}	
}

?>