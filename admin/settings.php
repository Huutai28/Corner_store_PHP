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
    <div><h1><i class="fa fa-cog"></i> Cài Đặt</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Cài đặt</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="tile">
        <form id="form" action="" method="post">
            <div class="form-group">
                <label class="control-label">Số Điện Thoại</label>
                <input class="form-control" type="text" name="phone" id="phone" oninput="check(this)" required>
            </div>
            <script>
                //hàm validation trường nhập số điện thoại
                function check(input) {
                    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                    var value = document.getElementById("phone").value;
                    if (isNaN(value)) {
                        input.setCustomValidity('Số điện thoại phải là số.');
                    }else if (vnf_regex.test(input.value) == false) {
                        input.setCustomValidity('Số điện thoại không đúng.');
                    } else {
                        //Hết lỗi, reset message
                        input.setCustomValidity('');
                    }
                }
            </script>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Lưu Thay Đổi</button>
            </div>
        </form>
        </div>
    </div>
</div>
</main>
<?php include "layout/script_js.php" ?>
<script>
    function display(){
    var displayData="true";
    $.ajax({
    url : "handle/settings/display.php",
    type : "POST",
    data : {displayData:displayData},
    dataType : "JSON",
    success : function(response) {
      $('#phone').val(response.user_phone);
      $('#email').val(response.user_email);
    }
    });
  }
  display();
  $( document).on('submit', '#form', function(e){
      e.preventDefault();
      var data = new FormData(this);
      data.append("submit", true);
      $.ajax({
          url : "handle/settings/update.php",
          type : "POST",
          data : data,
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

</script>


  </body>
</html>