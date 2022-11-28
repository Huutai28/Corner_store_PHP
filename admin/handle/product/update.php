<?php
include '../database.php';
if (isset($_POST['submit'])) {
   $id= mysqli_real_escape_string($con, $_POST['id']);
   $name= mysqli_real_escape_string($con, $_POST['name']);
   $price= mysqli_real_escape_string($con, $_POST['price']);
   $category= mysqli_real_escape_string($con, $_POST['category']);
   $description= mysqli_real_escape_string($con, $_POST['description']);
   $update_at = date('d/m/Y H:i:s');

   if (empty($_FILES["image"]["name"])) {
    $sql_update = "UPDATE `products` SET `product_name`='{$name}',`product_price`='{$price}',`product_description`='{$description}',`product_category`='{$category}',`update_at`='{$update_at}' WHERE `product_id` = '{$id}'";
   }else {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        $file_ext = explode('.', $image_name);
        $file_actual_ext = strtolower(end($file_ext));
        $file_name_new = uniqid('',true).".".$file_actual_ext;

        move_uploaded_file($image_tmp_name, '../../uploads/'.$file_name_new);
        $sql_update = "UPDATE `products` SET `product_name`='{$name}',`product_price`='{$price}',`product_image_path`='{$file_name_new}',`product_description`='{$description}',`product_category`='{$category}',`update_at`='{$update_at}' WHERE `product_id` = '{$id}'";
    }
    if ($con->query($sql_update) === TRUE) {
        $response = [
         'style' => 'success',
         'message' => 'Sửa sản phẩm thàng công!',
         ];
         echo json_encode($response);
     }   
}
?>