<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng kí Trouvaille</title>
  <link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/register_admin.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://kit.fontawesome.com/c71231073e.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper">
    <header>Đăng kí làm Seller in Trouvaille</header>
    <form id="register_account" method="post" action="<?php echo $link_sever ?>/account/create_seller">
      <div class="dbl-field">
        <div class="field">
          <input type="text" name="name" placeholder="Nhập tên của bạn" required>
          <i class='fas fa-user'></i>
        </div>
        <div class="field">
          <input type="text" id="email" name="email" placeholder="Nhập email của bạn" required>
          <i class='fas fa-envelope'></i>
        </div>
      </div>
      <div class="dbl-field">
        <div class="field">
          <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
          <i class="fa-solid fa-lock"></i>
        </div>
        <div class="field">
          <input type="password" id="confirm-password" name="confirm-password" placeholder="Nhập lại mật khẩu" required>
          <i class="fa-solid fa-lock"></i>
        </div>
      </div>
      <div class="message">
        <textarea placeholder="Giới thiệt về bản thân" id="description" name="description"></textarea>
        <i class="material-icons">message</i>
      </div>
      <div class="button-area">
        <button type="submit">Đăng kí tài khoản</button>
        <span></span>
      </div>
      <div>
        Bạn đã có tài khoản ? <a href="<?php echo $link_sever ?>/admin/login">Đăng nhập tại đây</a>
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="<?php echo $link_sever ?>/public/javascript/register_seller.js"></script>

</body>

</html>