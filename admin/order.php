<?php 
session_start();
if (!isset($_SESSION['EMAIL']) && !isset($_SESSION['PASSWORD'])) {
    header("Location: login");
}
 ?>
<!DOCTYPE html>
<html lang="vi">
 <head>
<?php include "layout/link_css.php"?>
 </head>
<body class="app sidebar-mini">
<?php include "layout/header&aside.php"?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-file-text-o"></i> Đơn Hàng</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Đơn Hàng</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="orderTable">
              <thead>
                <tr>
                  <th>Tên Khách Hàng</th>
                  <th>Số Điện Thoại</th>
                  <th>Địa Chỉ</th>
                  <th>Tổng Cộng</th>
                  <th>Ngày Đặt</th>
                  <th>Đơn Hàng</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'handle/database.php';
                $sql = "SELECT `order_id`, `order_name`, `order_phone`, `order_address`, `order_total`, `created_at` FROM `orders`";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['order_name'] ?></td>
                    <td><?php echo $row['order_phone'] ?></td>
                    <td><?php echo $row['order_address'] ?></td>
                    <td><?php echo number_format($row['order_total'])?> VNĐ</td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td> <button id="btn_detail" class="btn btn-primary" value="<?php echo $row['order_id'] ?>" type="button">Xem Chi Tiết</button></td>
                </tr>
                <?php } }else { ?>
                    <tr>
                        <td valign="top" colspan="6" class="dataTables_empty">Không có dữ liệu</td>
                    </tr>
                <?php } ?>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="clearix"></div>
  </div>
</main>

<div class="modal fade bd-update-modal-xl" id="modal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Xem Chi Tiết Đơn Hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body" id="data-order">
         
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
      </div>
    </div>
  </div>

<?php include "layout/script_js.php" ?>
<script>
  $('#orderTable').DataTable();  
</script>
<script>
$( document).on('click', '#btn_detail', function(e){
      var id = $(this).val();
      $('#modal').modal('show');
      $.ajax({
        url : "handle/order/order_detail.php",
        type : "POST",
        data : {id:id},
        dataType : "html",
        success : function(response) {
           $('#data-order').html(response);
           $('#modal').modal('show');
        }
      });
});
</script>
  </body>
</html>