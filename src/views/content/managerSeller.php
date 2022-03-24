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
<script src="<?php echo $link_sever ?>/public/javascript/admin/managerSeller.js"></script>