<?php
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];

    echo $name .'<br>'.$image.'<br>'.$_POST['save'];
}
?>