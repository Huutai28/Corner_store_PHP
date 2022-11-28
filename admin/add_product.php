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
    <div><h1><i class="fa fa-th"></i> Thêm sản phẩm</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
        <li class="breadcrumb-item"><a href="#">Thêm mới</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
         <form id="addFormProduct" method="GET" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
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
                <div class="col-lg-4 offset-lg-1">
                    <div class="form-group">
                    <label class="control-label" for="image">Ảnh</label>
                    <input class="form-control" type="file" id="image" name="image" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="jpg png jpeg" data-min-width="139" data-max-width="321"  data-min-height="139" data-max-height="321" accept=".jpg, .jpeg, .png" required>
                    <small class="form-text text-muted">Bắt buộc, chiều rộng 140px - 320px, chiều cao 140px - 320px</small>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                    <label for="exampleTextarea">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="tile-footer">
                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            </div>
         </form>
        </div>
    </div>
</div>
</main>
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
    } )
</script>
<script>
$( document ).ready(function() {
    $( document).on('submit', '#addFormProduct', function(e){
        e.preventDefault();
        var data_add_product = new FormData(this);
        data_add_product.append("submit", true);
        $.ajax({
            url : "handle/product/insert.php",
            type : "POST",
            data : data_add_product,
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
                $('#name_add').val(null);
                $('#image_add').val(null);
                $('#price_add').val(null);
                $('#category_add').val(null);
                $('#description_add').val(null);
                $('#addForm .ck-content p').html('<p></p>');
                $('#addForm .dropify-clear').click();
                display();
                });
            }
        });
    });
});
</script>
  </body>
</html>