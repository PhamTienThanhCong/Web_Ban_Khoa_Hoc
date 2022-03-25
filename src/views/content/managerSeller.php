<link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/admin_manager_seller.css" />
<div class="sales-boxes">
  <div class="recent-sales box" style="width:100%">
    <div class="title">Seller mới tham gia</div>
    <div class="sales-details">
      <div class="table-users">
        <table cellspacing="0">
          <tbody id="wait-seller">
          <tr>
            <th>avatar</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Trạng thái</th>
            <th width="250">Thông tin</th>
          </tr>
          </tbody>


        </table>
      </div>
    </div>
    <div class="button">
      <a style="cursor: pointer" type="btn" id = "see-more-wait-seller">Xem thêm</a>
    </div>
  </div>
</div>
<div class="sales-boxes" style="margin-top: 25px">
  <div class="recent-sales box" style="width:100%">
    <div class="title">Quản lý seller</div>
    <div class="sales-details">
      <div class="table-users">
        <table cellspacing="0">
          <tbody id="done-seller">
            <tr>
              <th>avatar</th>
              <th>Tên</th>
              <th>Email</th>
              <th>Active</th>
              <th width="250">Thông tin</th>
            </tr>
          </tbody>


        </table>
      </div>
    </div>
    <div class="button">
      <a style="cursor: pointer" type="btn" id = "see-more-done-seller">Xem thêm</a>
    </div>
  </div>
</div>
<!-- Modal -->
<link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/modal.css" />
<div class="modal-wrapper">
  <div class="modal">
    <div class="head">
      Thông báo xác nhận
      <a class="btn-close trigger" href="javascript:;"></a>
    </div>
    <div id="content-modal">
      <div id="modal-name">
      </div>
      <div id="modal-info">
        <p>Tên: Bé Công</p>
        <p>Email: test@gmail.com</p>
        <p>Mô tả bản thân: đệp trai</p>
      </div>
      <form id="submit-modal" action="post" class="btn-modal">
        <input id="id-seller" name="id" type="hidden">
        <input id="id-type" type="hidden">
        <button type="submit" class="button">Xác nhận</button>
        <button type="button" class="button trigger">Quay lại</button>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->

<script src="<?php echo $link_sever ?>/public/javascript/admin/managerSeller.js"></script>
