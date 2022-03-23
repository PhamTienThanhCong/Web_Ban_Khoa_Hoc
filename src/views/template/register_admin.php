<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng kí Trouvaille</title>
  <link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/register_admin.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://kit.fontawesome.com/c71231073e.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="wrapper">
    <header>Đăng kí làm Seller in Trouvaille</header>
    <form action="#">
      <div class="dbl-field">
        <div class="field">
          <input type="text" name="name" placeholder="Nhập tên của bạn">
          <i class='fas fa-user'></i>
        </div>
        <div class="field">
          <input type="text" name="email" placeholder="Nhập email của bạn">
          <i class='fas fa-envelope'></i>
        </div>
      </div>
      <div class="dbl-field">
        <div class="field">
          <input type="password" name="password" placeholder="Nhập mật khẩu">
          <i class="fa-solid fa-lock"></i>
        </div>
        <div class="field">
          <input type="password" name="confirm-password" placeholder="Nhập lại mật khẩu">
          <i class="fa-solid fa-lock"></i>
        </div>
      </div>
      <div class="message">
        <textarea placeholder="Giới thiệt về bản thân" name="message"></textarea>
        <i class="material-icons">message</i>
      </div>
      <div class="button-area">
        <button type="submit">Send Message</button>
        <span></span>
      </div>
      <div>
        Bạn đã có tài khoản ? <a href="<?php echo $link_sever ?>/admin/login">Đăng nhập tại đây</a>
      </div>
    </form>
  </div>

  <script src="script.js"></script>

</body>
</html>