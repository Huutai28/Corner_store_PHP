<?php
    include '../database.php';
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con ,$_POST['name']);
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $update_at = date('d/m/Y H:i:s');
       
        $sql_query = "SELECT `category_id` FROM `categories` WHERE `category_name`='{$name}'";
        $result = $con->query($sql_query);

        if ($result->num_rows > 0 ) {
            $response = [
                'style' => 'info',
                'message' => 'Tên danh mục "'.$name.'" đẫ được sử dụng. Vui lòng đặt tên khác!',
            ];
            echo json_encode($response);
        }else{
            $file_ext = explode('.', $image_name);
            $file_actual_ext = strtolower(end($file_ext));
            $file_name_new = uniqid('',true).".".$file_actual_ext;

            move_uploaded_file($image_tmp_name, '../../uploads/'.$file_name_new);

            $sql_insert = "INSERT INTO `categories` (`category_name`, `category_image_path`, `update_at`) VALUES ('{$name}', '{$file_name_new}', '{$update_at}')"; 
        }
        if ($con->query($sql_insert) === TRUE) {
            $response = [
             'style' => 'success',
             'message' => 'Thêm danh mục "'.$name.'" thàng công!',
             ];
             echo json_encode($response);
         }     
    }
?>