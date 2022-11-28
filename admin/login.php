<?php
include "handle/database.php";
session_start();
$message='';
if (isset($_SESSION['EMAIL']) && isset($_SESSION['PASSWORD'])) {
  header("Location: home");
}
if (isset($_POST['login'])) {
  $email = mysqli_escape_string($con, $_POST["email"]);
  $password = mysqli_escape_string($con, md5($_POST["password"]));

  $sql = "SELECT * FROM `user` WHERE `user_email` = '{$email}' AND `user_password` = '{$password}';";
  $result = $con->query($sql);
  if ($result->num_rows == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['EMAIL'] = $row['user_email'];
    $_SESSION['PASSWORD'] = $row['user_password'];

    if(!empty($_POST["rememberMe"])) {
      setcookie ("email",$_POST["email"],time()+ 2592000);
      setcookie ("password",$_POST["password"],time()+ 2592000);
    } else {
      setcookie("email","");
      setcookie("password","");
    }

    header("Location: home");
  }else{
    $message='<div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">×</button><strong>Email hoặc mật khẩu không đúng!</strong> Vui lòng thử lại.
      </div>';
      setcookie("email","");
      setcookie("password","");
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Đăng Nhập Trang Trị</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
     <?php echo $message; ?>
      <div class="login-box">
        <form class="login-form" method="POST" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Đăng Nhập</h3>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="text" placeholder="Nhập Email" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" autofocus required>
          </div>
          <div class="form-group">
            <label class="control-label">Mật Khẩu</label>
            <input class="form-control" type="password" placeholder="Nhập mật Khẩu" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox" name="rememberMe"><span class="label-text">Nhớ tài khoản</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Quên mặt khẩu ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Đăng Nhập</button>
          </div>
        </form>
        <form class="forget-form" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Đổi Mật Khẩu ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Nhập email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Cài Lại</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Quay lại đăng nhập</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>