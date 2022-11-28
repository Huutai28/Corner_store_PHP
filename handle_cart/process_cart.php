<?php
session_start();
include "../admin/handle/database.php";
switch ($_GET['action']) {
    case "add":
        $result = update_cart(true);
        echo json_encode(array(
            'style'=>"success",
            'message'=>"Thêm sản phẩm vào giỏ hàng thành công"
        ));
        break;
    case "delete":
        if (isset($_POST['id'])) {
            unset($_SESSION["cart"][$_POST['id']]);
        }
        echo json_encode(array(
            'status' => 1,
            'message' => 'Xóa sản phẩm thành công'
        ));
        break;
        case "update":
            $result = update_cart();
            echo json_encode(array(
                'style'=>"success",
                'message'=>"Thay đổi số lượng sản phẩm trong giỏ hàng thành công"
            ));
            break;
    default:
        break;
}

function update_cart($add = false) {
    foreach ($_POST['quantity'] as $id => $quantity) {
        if ($quantity == 0) {
            unset($_SESSION["cart"][$id]);
        } else {
            if (!isset($_SESSION["cart"][$id])) {
                $_SESSION["cart"][$id] = 0;
            }
            if ($add) {
                $_SESSION["cart"][$id] += $quantity;
            } else {
                $_SESSION["cart"][$id] = $quantity;
            }
        }
    }
    return true;
}
