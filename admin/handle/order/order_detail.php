<?php
 include '../database.php';
 if (isset($_POST['id'])) {
   $id = $_POST['id'];
   $sql_order= "SELECT * FROM `orders` WHERE `order_id` = '{$id}'";
   $result_order = $con->query($sql_order);

   if ($result_order->num_rows == 1) {
      $order = $result_order->fetch_assoc();
      ?>
      <div class="card mb-3 text-black bg-light">
              <div class="card-body">
                <blockquote class="card-blockquote">
                  <p>Họ Tên: <?php echo $order['order_name']?></p>
                  <p>Số điện thoại: <?php echo $order['order_phone']?></p>
                  <p>Địa chỉ: <?php echo $order['order_address']?></p>
                  <p>Ngày đặt: <?php echo $order['created_at']?></p>
                  <p>Email: <?php if ($order['order_email'] == NUll) {
                    echo '(Trống)';
                  }else{ echo $order['order_email']; } ?></p>
                  <footer>Tổng Cộng:  
                    <cite title="Source Title"><?php echo number_format($order['order_total'])?> VNĐ</cite>
                  </footer>
                </blockquote>
              </div>
          </div>
          <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Ảnh</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Đơn Giá</th>
                  <th>Số Lượng</th>
                  <th>Thành Tiền</th>
                </tr>
              </thead>
              <tbody>
  <?php
  $sql_order_detail= "SELECT * FROM `order_detail` WHERE `order_detail_order_id` = '{$id}'";
  $result_order_detail = $con->query($sql_order_detail);
  $i = 0;
  while ($order_detail = $result_order_detail->fetch_assoc()) {
    $i++;
    $id_products = $order_detail['order_detail_product_id']; 
    $sql_product = "SELECT  `product_name`, `product_image_path` FROM `products` WHERE `product_id` = '{$id_products}'";
    $result_product = $con->query($sql_product);
    $product = $result_product->fetch_assoc();
  ?>
<tr>
  <td><?php echo $i ?></td>
  <td><img src="./uploads/<?php echo $product['product_image_path'] ?>" alt="" width="140" height="140"></td>
  <td><?php echo $product['product_name'] ?></td>
  <td><?php echo number_format($order_detail['order_detail_price']) ?> VNĐ</td>
  <td><?php echo $order_detail['order_detail_quantity']?></td>
  <td><?php echo number_format($order_detail['order_detail_price'] * $order_detail['order_detail_quantity']) ?>VNĐ</td>
</tr>
  <?php } ?>
              </tbody>
          </table>

 <?php } } ?>