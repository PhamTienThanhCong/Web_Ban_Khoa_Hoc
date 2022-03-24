<!DOCTYPE html>
<html lang="vi" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/login_admin.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <title>Đăng nhập Trouvaille</title>
  <link rel="shortcut icon" href="<?php echo $link_sever ?>/public/images/system/Logo.ico" type="image/x-icon">
</head>

<body>
  <div class="wrapper">
    <div class="title">Login Trouvaille</div>
    <form id="admin_login" method="post" action="<?php echo $link_sever ?>/account/login_admin">
      <div class="field">
        <input type="email" name="email" required>
        <label>Email</label>
      </div>
      <div class="field">
        <input type="password" name="password" required>
        <label>Mật khẩu</label>
      </div>
      <div class="content">
        <div class="checkbox">
          <input type="checkbox" name="remember" id="remember-me">
          <label for="remember-me">Ghi nhớ đăng nhập</label>
        </div>
        <div class="pass-link"><a href="#">Quên mật khẩu</a></div>
      </div>
      <div class="field">
        <input type="submit" value="Login">
      </div>
      <div class="signup-link">Không có tài khoản? <a href="<?php echo $link_sever ?>/admin/register">Đăng kí ngay</a></div>
    </form>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?php echo $link_sever ?>/public/javascript/login_admin.js"></script>

</html>