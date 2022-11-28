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
      <h1><i class="fa fa-shopping-basket"></i> Sản Phẩm</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th>Giá</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody id="displayData">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="clearix"></div>
  </div>


</main>
  <!--modal update form-->
  <div class="modal fade bd-update-modal-xl" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sửa sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="updateFormProduct" method="GET" action="" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                <input class="form-control" type="hidden" id="id" name="id">
                  <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Nhập tên" minlength="3" required><small class="form-text text-muted">Bắt buộc, nhiều hơn 2 ký tự</small>
                  </div>
                  <div class="form-group">
                    <label for="price">Giá</label>
                    <input class="form-control" id="price" name="price" type="number" min="10000" placeholder="Nhập giá" required><small class="form-text text-muted">Bắt buộc, tối thiểu 10000</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Danh mục</label>
                    <select class="form-control" id="category" name="category" required>
                    <option value="" select>--Chọn danh mục--</option>
                    <?php
                    include 'handle/database.php';
                    $sql_category = "SELECT `category_id`, `category_name` FROM `categories`";
                    $result_category = $con->query($sql_category);
                    if ($result_category->num_rows > 0) {
                      while ($row = mysqli_fetch_assoc($result_category)) {
                    ?>
                      <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
                    <?php } } ?>
                    </select>
                    <small class="form-text text-muted">Bắt buộc</small>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="control-label" for="image">Ảnh</label>
                    <input class="form-control" type="file" id="image" name="image" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpg png jpeg" data-min-width="139" data-max-width="321"  data-min-height="139" data-max-height="321" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">Bắt buộc, chiều rộng 140px - 320px, chiều cao 140px - 320px</small>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>

          </div>
        </form>
      </div>
    </div>
  </div>
<?php include "layout/script_js.php" ?>
<script>
  $('#image').dropify({
    messages: {
        'default': 'Kéo hoặc click vào đây',
        'replace': 'Thả vào đây',
        'remove':  'Xóa',
        'error':   'Đã có lỗi xảy ra, hãy di chuột vào đây để xem thông báo!',
    },
    error: {
        'fileSize': 'Kích thước tệp quá lớn ({{ value }} tối đa).',
        'minWidth': 'Chiều rộng hình ảnh quá nhỏ (140px tối thiểu).',
        'maxWidth': 'Chiều rộng hình ảnh quá lớn (320px tối đa).',
        'minHeight': 'Chiều cao hình ảnh quá nhỏ (140px tối thiểu).',
        'maxHeight': 'Chiều cao hình ảnh quá lớn (320px tối đa).',
        'imageFormat': 'Định dang hình ảnh không cho phép (chỉ {{value}})'
    }
  });
</script>
<script>
  ClassicEditor
  .create( document.querySelector( '#description' ) )
  .then( editor => {
    window.editor = editor;
      YourEditor = editor;
  } )
</script>
<script>
$( document ).ready(function() {
  function display(){
    var displayData="true";
    $.ajax({
    url : "handle/product/display.php",
    type : "POST",
    data : {displayData:displayData},
    dataType : "html",
    success : function(response) {
      $('#displayData').html(response);
      $('#sampleTable').DataTable();
    }
    });
  }
  display();
    $( document).on('click', '#edit_btn_product', function(e){
      var id = $(this).val();
      $.ajax({
        url : "handle/product/edit.php",
        type : "POST",
        data : {id:id},
        dataType : "JSON",
        success : function(data) {
          $('#updateFormProduct .dropify-wrapper').removeClass('has-error');
          var imagePath = './uploads/' + data.product_image_path;
          $('#id').val(data.product_id);
          $('#name').val(data.product_name);
          $('#price').val(data.product_price);

          $('#category').val(data.product_category);

          $('#description').val(data.product_description);
          YourEditor.setData(data.product_description);
          $('#updateFormProduct .ck-content p').html(data.product_description);
          $('#updateFormProduct .dropify-preview').css("display","block");
          $('#updateFormProduct .dropify-render').html('<img src=' +imagePath +' />');
          $('#updateModal').modal('show');
      }
      });
    });

    $( document).on('submit', '#updateFormProduct', function(e){
      e.preventDefault();
      var data_edit_product = new FormData(this);
      data_edit_product.append("submit", true);
      $.ajax({
          url : "handle/product/update.php",
          type : "POST",
          data : data_edit_product,
          processData : false,
          contentType : false,
          dataType : "JSON",
          success : function(response) {
            swal({
                  title: "Thông báo!",
                  text: response.message,
                  icon: response.style,
                  button: "Thoát",
              }).then(() => {
                display();
              });
          }
      });
    });

    $(document).on('click',"#del_btn_product",function(e) {
      var id = $(this).val();
      swal({
        title: "Bạn có chắc không?",
        text: "Sau khi xóa, bạn sẽ không thể khôi phục dữ liệu này!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ['Thoát', 'Ok']
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url : "handle/product/delete.php",
                type : "POST",
                data : {id:id},
                dataType : "JSON",
                success : function(response) {
                    swal({
                            title: "Thông báo!",
                            text: response.message,
                            icon: response.style,
                            button: "Thoát",
                        }).then(() => {
                          display();
                        });
                }
            });
        } else {
            swal({
                    text: "Đã hủy xóa!",
                    button: "Thoát",
                });
        }
      }); 
    });

});
</script>
  </body>
</html>