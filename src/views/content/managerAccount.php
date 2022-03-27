<link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/manager_account.css" />
<div class="sales-boxes">
  <div class="recent-sales box" style="width: 100%; display: block">
    <div class="title">Khoản của tôi</div>
    <br />
    <div class="sales-details">
      <div class="user-detail">
        <div class="avata">
          <img id="output" width="100%" src="<?php echo $link_sever ?>/public/images/avatar/<?php echo $_SESSION['image_admin'] ?>" alt="" />
        </div>

        <form id="user-in4" method="post" action="<?php echo $link_sever ?>account/update_account_admin" enctype="multipart/form-data">
          <label for="name">Tên: </label>
          <input type="text" id="name" name="name_admin" value="Cong be" readonly />
          <br />
          <label for="email">Email: </label>
          <input type="email" id="email" name="email_admin" value="<?php echo $data['email']?>" readonly />
          <br />
          <label style="width: 300px;" for="email">Thông tin của bạn: </label>
          <!-- <br> -->
          <textarea class="textarea-view" name="infor" id="" cols="30" rows="6" readonly><?php echo $data['description']?></textarea>
          <br />
          <input type="hidden" id="img" name="image" />
          <div class="hidden-lable">
            <label for="phone_number">password</label>
            <input style="border-bottom: 1px solid #004080" type="password" id="password" name="password" readonly required />
          </div>
          <br />
          <button id="btn" type="button" onclick="edit()">Sửa</button>
          <button id="change-danger" class="btn btn-danger" type="button">
            Thay đổi mất khẩu
          </button>
        </form>
        <form id="my-password" method="post" action="">
          <h3 style="display: inline">Đổi mật khẩu</h3>
          <br /><br />
          <label for="">Mật khẩu cũ:</label>
          <input id="old-password" class="input-in4" type="password" name="password" />
          <br />
          <label for="">Mật khẩu mới</label>
          <input id="new-password" class="input-in4" type="password" name="new_password" />
          <br />
          <label for="">Nhập lại mật khẩu:</label>
          <input id="confirm-password" class="input-in4" type="password" name="new_password" />
          <br />
          <button class="btn btn-danger">Lưu mật khẩu mới</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo $link_sever ?>/public/javascript/manager_account.js"></script>