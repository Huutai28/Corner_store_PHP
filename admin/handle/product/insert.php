<?php
 include '../database.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con ,$_POST['name']);
    $price = mysqli_real_escape_string($con ,$_POST['price']);
    $category = mysqli_real_escape_string($con ,$_POST['category']);
    $description = mysqli_real_escape_string($con ,$_POST['description']);
    $update_at = date('d/m/Y H:i:s');

    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    $file_ext = explode('.', $image_name);
    $file_actual_ext = strtolower(end($file_ext));
    $file_name_new = uniqid('',true).".".$file_actual_ext;

    move_uploaded_file($image_tmp_name, '../../uploads/'.$file_name_new);

    $sql_insert = "INSERT INTO `products`( `product_name`, `product_price`, `product_image_path`, `product_description`, `product_category`, `update_at`) VALUES ('{$name}','{$price}','{$file_name_new}','{$description}','{$category}','{$update_at}')";
    if ($con->query($sql_insert) === TRUE) {
        $response = [
         'style' => 'success',
         'message' => 'Thêm sản phẩm "'.$name.'" thàng công!',
         ];
         echo json_encode($response);
     }     
}
?>