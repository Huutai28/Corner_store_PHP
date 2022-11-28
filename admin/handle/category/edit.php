<?php
 include '../database.php';
 if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql_query = "SELECT `category_id`, `category_name`, `category_image_path` FROM `categories` WHERE `category_id`='{$id}'";
    $result = $con->query($sql_query);

    if ($result->num_rows == 1) {
        $data = mysqli_fetch_array($result);
        echo json_encode($data);
        return;
    }
 }
?>