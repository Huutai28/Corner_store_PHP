<?php
 include '../database.php';
 if (isset($_POST['submit'])) {
    $phone = mysqli_real_escape_string($con ,$_POST['phone']);
    $email = mysqli_real_escape_string($con ,$_POST['email']);

    $sql = "UPDATE `user` SET `user_email`='{$email}',`user_phone`='{$phone}' WHERE `user_id`= 1";
    if ($con->query($sql) === TRUE) {
        $response = [
         'style' => 'success',
         'message' => 'Đã lưu thay đổi thàng công!',
         ];
         echo json_encode($response);
     }   
 }
?>