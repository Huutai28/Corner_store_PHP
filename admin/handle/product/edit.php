<?php
include '../database.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql_query = "SELECT `product_id`, `product_name`, `product_price`, `product_image_path`, `product_description`, `product_category` FROM `products` WHERE `product_id` = '{$id}'";
    $result = $con->query($sql_query);

    if ($result->num_rows == 1) {
        $data = mysqli_fetch_array($result);
        echo json_encode($data);
        return;
    }
}
?>