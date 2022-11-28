<?php
 include '../database.php';
 if ($_POST['displayData']) {
    $sql = "SELECT `user_email`, `user_phone` FROM `user` LIMIT 1";
    $result = $con->query($sql);
    if ($result->num_rows == 1) {
    $data = mysqli_fetch_array($result);
        echo json_encode($data);
        return;
    }
 }

?>