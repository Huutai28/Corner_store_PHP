<?php
 include '../database.php';
 if (isset($_POST['displayData'])) {
    $sql_query = "SELECT `category_id`, `category_name` FROM `categories`";
    $result = $con->query($sql_query);
    if ($result->num_rows > 0) {
        $i = 0;
        $table = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            $id = $row['category_id'];
            $name= $row['category_name'];
            $products = $con->query("SELECT `product_id` FROM `products` WHERE `product_category` = '{$id}'")->num_rows;
            $table.= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$name.'</td>
                        <td>'.$products.'</td>
                        <td><button id="edit_btn_category" class="btn btn-outline-warning" value="'.$id.'" type="button"><i class="fa fa-pencil-square-o"></i>Sửa</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-danger" value="'.$id.'" id="del_btn_category" type="button"><i class="fa fa-trash-o"></i>Xóa</button></td>
                    </tr>';
        };
    }else{
        $table ='<tr>
                    <td style="text-align: center;" colspan="4">Không có dữ liệu</td>
                </tr>';
    }
    echo $table;

 }
?>