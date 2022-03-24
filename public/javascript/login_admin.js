function alertLogin() {
  document.getElementById("admin_login").innerHTML = `
    <div >
        <p>Bạn đã đăng kí tài khoản thành công.</p>
        <p>vui long chờ một khoảng thời gian để admin duyệt.</p>
        <p>Chúng thôi sẽ thông báo lại cho bạn sau</p>
        <a href="/">Quay lại trang chủ</a>
    </div>`;
}
$(document).ready(function () {
  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };
  $("#admin_login").on("submit", function (e) {
    var currentLocation = window.location;
    currentLocation = currentLocation.protocol + "//" + currentLocation.host;
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: this.action,
      data: $(this).serializeArray(),
      dataType: "html",
      success: function (response) {
        if (response == "0") {
          toastr["error"](
            "Đăng nhập thất bại<br/>Tài khoản hoặc mật khẩu không đúng"
          );
        }
        if (response == "1") {
          document.location.href = currentLocation + "/admin/overview";
        } else if (response == "2") {
          document.location.href = currentLocation + "/seller/overview";
        } else if (response == "3") {
          toastr["info"]("Tài khoản của bạn đang chờ phê duyệt");
          alertLogin();
        }
      },
    });
  });
});
