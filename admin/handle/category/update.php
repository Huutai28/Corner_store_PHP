<?php 
 include '../database.php';
if (isset($_POST['submit'])) {
   $id = mysqli_real_escape_string($con ,$_POST['id']);
   $name = mysqli_real_escape_string($con ,$_POST['name']);
   $update_at = date('d/m/Y H:i:s');
   

   $sql_query = "SELECT `category_id` FROM `categories` WHERE `category_name`='{$name}' AND `category_id`!= '{$id}'";
   $result = $con->query($sql_query);

   if ($result->num_rows > 0 ) {
    $response = [
        'style' => 'info',
        'message' => 'Tên danh mục "'.$name.'" đẫ được sử dụng. Vui lòng đặt tên khác!',
    ];
    echo json_encode($response);
    exit();
    }else if(empty($_FILES["image"]["name"])){
        $sql_update = "UPDATE categories SET `category_name`='{$name}', `update_at`='{$update_at}' WHERE `category_id`='{$id}'";
    }else{
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        $file_ext = explode('.', $image_name);
        $file_actual_ext = strtolower(end($file_ext));
        $file_name_new = uniqid('',true).".".$file_actual_ext;

        move_uploaded_file($image_tmp_name, '../../uploads/'.$file_name_new);
        $sql_update = "UPDATE categories SET `category_name`='{$name}', `category_image_path`='{$file_name_new}', `update_at`='{$update_at}' WHERE `category_id`='{$id}'";
    }
    if ($con->query($sql_update) === TRUE) {
        $response = [
         'style' => 'success',
         'message' => 'Sửa danh mục thàng công!',
         ];
         echo json_encode($response);
     }   

}

?>