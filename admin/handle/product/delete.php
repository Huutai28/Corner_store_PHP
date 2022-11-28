<?php
include '../database.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql_delete = "DELETE FROM `products` WHERE `product_id`='{$id}'";
    if ($con->query($sql_delete) === TRUE) {
        $response = [
            'style' => 'success',
            'message' => 'Xóa sản phẩm thành công!',
            ];
        echo json_encode($response);
      }
}
?>