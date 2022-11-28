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
        <div><h1><i class="fa fa-th"></i> Danh Mục</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
        </ul>
    </div>
<div class="row">
  <div class="col-md-6">
    <div class="tile">
      <h3 class="tile-title">Thêm Mới</h3>
      <form id="addFormCategory" method="GET" action="" enctype="multipart/form-data">
        <div class="tile-body">    
            <div class="form-group">
              <label class="control-label" for="name">Tên danh mục</label>
              <input class="form-control" type="text" id="name" name="name" placeholder="Nhập tên" minlength="3" required>
              <small class="form-text text-muted">Bắt buộc, nhiều hơn 2 ký tự</small>
            </div>
            <div class="form-group">
              <label class="control-label" for="image">Ảnh</label>
              <input class="form-control" type="file" id="image" name="image" class="dropify" data-default-file="" data-max-file-size="1M" data-allowed-file-extensions="jpg png jpeg" data-min-width="1199" data-max-width="1681"  data-min-height="299" data-max-height="501" accept=".jpg, .jpeg, .png" required>
              <small class="form-text text-muted">Bắt buộc, chiều rộng 1200px - 1680px, chiều cao 300px - 500px</small>
            </div>
        </div>
        <div class="tile-footer">
          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Lưu Thay Đổi</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <div class="tile">
      <h3 class="tile-title">Danh Sách</h3>
      <table class="table table-hover">
        <thead>
            <tr>
              <th>#</th>
              <th>Tên danh mục</th>
              <th>Số lượng mặt hàng</th>
              <th>Hành động</th>
            </tr>
        </thead>
        <tbody id="displayData">
        </tbody>
      </table>
    </div>
  </div>
  <div class="clearix"></div>
</div>
<!--modal update form-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Sửa danh mục</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="updateFormCategory" method="GET" action="" enctype="multipart/form-data">
          <div class="tile-body">
            <input class="form-control" type="hidden" id="id" name="id">
              <div class="form-group">
                <label class="control-label" for="name">Tên danh mục</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Nhập tên" minlength="3" required>
                <small class="form-text text-muted">Bắt buộc, nhiều hơn 2 ký tự</small>
              </div>
              <div class="form-group">
                <label class="control-label" for="image">Ảnh</label>
                <input class="form-control" type="file" id="image" name="image" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpg png jpeg" data-min-width="1199" data-max-width="1681"  data-min-height="299" data-max-height="501" accept=".jpg, .jpeg, .png">
                <small class="form-text text-muted">Bắt buộc, chiều rộng 1200px - 1680px, chiều cao 300px - 500px</small>
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
</main>
<?php include "layout/script_js.php" ?>

<script>
  $('#addFormCategory #image,#updateFormCategory #image').dropify({
    messages: {
        'default': 'Kéo hoặc click vào đây',
        'replace': 'Thả vào đây',
        'remove':  'Xóa',
        'error':   'Đã có lỗi xảy ra, hãy di chuột vào đây để xem thông báo!',
    },
    error: {
        'fileSize': 'Kích thước tệp quá lớn ({{ value }} tối đa).',
        'minWidth': 'Chiều rộng hình ảnh quá nhỏ (1200px tối thiểu).',
        'maxWidth': 'Chiều rộng hình ảnh quá lớn (1680px tối đa).',
        'minHeight': 'Chiều cao hình ảnh quá nhỏ (300px tối thiểu).',
        'maxHeight': 'Chiều cao hình ảnh quá lớn (500px tối đa).',
        'imageFormat': 'Định dang hình ảnh không cho phép (chỉ {{value}})'
    }
});
</script>
<script>
$( document ).ready(function() {
    function displayData(){
      var displayData="true";
      $.ajax({
      url : "handle/category/display.php",
      type : "POST",
      data : {displayData:displayData},
      dataType : "html",
      success : function(response) {
        $('#displayData').html(response);
      }
      });

    }
    displayData();

    $( document).on('submit', '#addFormCategory', function(e){
      e.preventDefault();
      var data_add_category = new FormData(this);
      data_add_category.append("submit", true);
      $.ajax({
          url : "handle/category/insert.php",
          type : "POST",
          data : data_add_category,
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
                displayData();
                $("#addFormCategory #name").val(null); 
                $("#addFormCategory #image").val(null); 
                $('#addFormCategory .dropify-clear').click(); 
              });
          }
      });
    });

    $( document).on('click', '#edit_btn_category', function(e){
      var id = $(this).val();
      $.ajax({
        url : "handle/category/edit.php",
        type : "POST",
        data : {id:id},
        dataType : "JSON",
        success : function(data) {
        $('#updateModal .dropify-wrapper').removeClass('has-error');
        
        var imagePath = './uploads/' + data.category_image_path;
        $('#updateFormCategory #id').val(data.category_id);
        $('#updateFormCategory #name').val(data.category_name);
        $('#updateFormCategory .dropify-preview').css("display","block");
        $('#updateFormCategory .dropify-render').html('<img src=' +imagePath +' />');
        $('#updateModal').modal('show');
      }
      });
    });

    $( document).on('submit', '#updateFormCategory', function(e){
      e.preventDefault();
      var data_edit_category = new FormData(this);
      data_edit_category.append("submit", true);
      $.ajax({
          url : "handle/category/update.php",
          type : "POST",
          data : data_edit_category,
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
                displayData();
              });
          }
      });
    });

    $(document).on('click',"#del_btn_category",function(e) {
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
                  url : "handle/category/delete.php",
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
                          displayData();
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