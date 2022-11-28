<?php
 include '../database.php';

 if (isset($_POST['displayData'])) {
    $sql_query = "SELECT * FROM `products` INNER JOIN categories ON products.product_category= categories.category_id;";
    $result = $con->query($sql_query);
    if ($result->num_rows > 0) {
      $table = '';
      while ($row = mysqli_fetch_assoc($result)) {
         $id = $row['product_id'];
         $image_path = $row['product_image_path'];
         $name = $row['product_name'];
         $category = $row['category_name'];
         $price = number_format($row['product_price']);

         $table .='<tr>
                     <td><img src="./uploads/'.$image_path.'" alt="" width="140" height="140"></td>
                     <td>'.$name.'</td>
                     <td>'.$category.'</td>
                     <td>'.$price.' VNĐ</td>
                     <td><button id="edit_btn_product" class="btn btn-outline-warning" value="'.$id.'" type="button"><i class="fa fa-pencil-square-o"></i>Sửa</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-danger" value="'.$id.'" id="del_btn_product" type="button"><i class="fa fa-trash-o"></i>Xóa</button></td>
                  </tr>';
      }
    }else{
      $table = '<tr>
                  <td valign="top" colspan="5" class="dataTables_empty">Không có dữ liệu</td>
               </tr>
      ';
    }
    echo $table;
 }
 
?>