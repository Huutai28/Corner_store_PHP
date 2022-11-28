<?php
 include '../database.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql_delete = "DELETE FROM `categories` WHERE `category_id`='{$id}'";
    try {
         if ($con->query($sql_delete) === TRUE) {
        $response = [
            'style' => 'success',
            'message' => 'Xóa danh mục thành công!',
            ];
        echo json_encode($response);
    }
    } catch (Throwable $th) {
        $response = [
            'style' => 'info',
            'message' => 'Xóa danh mục không thành công!',
            ];
        echo json_encode($response);
    }
   
}
?>