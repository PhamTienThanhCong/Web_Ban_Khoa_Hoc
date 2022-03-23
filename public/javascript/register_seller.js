const validateEmail = (email) => {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

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

  $("#register_account").on("submit", function (event) {
    event.preventDefault();
    let check = true;
    if (validateEmail($("#email").val()) == null) {
      toastr["error"]("email bạn nhập không đúng định dạng");
      check = false;
    }
    if ($("#password").val() != $("#confirm-password").val()) {
      check = false;
      toastr["error"]("Mật khẩu không khớp");
    }
    if (document.getElementById("description").value.trim() == "") {
      check = false;
      toastr["error"]("Mô tả không thể để trống");
    }
    if (check) {
      var currentLocation = window.location;
      currentLocation =
        currentLocation.protocol +
        "//" +
        currentLocation.host +
        "/account/create_seller";

      $.ajax({
        type: "POST",
        url: currentLocation,
        data: $(this).serializeArray(),
        dataType: "html",
        success: function (response) {
          if (response == 1) {
            toastr["success"]("Tạo tài khoản thành công");
            registerDone();
          } else if (response == 2) {
            toastr["warning"]("Tài khoản bạn tạo bị lỗi. Vui lòng thử lại sau");
          } else {
            toastr["error"]("Email không hợp lệ hoặc đã bị trùng");
          }
        },
      });
    }
  });
});
function registerDone() {
  var currentLocation = window.location;
  currentLocation =
    currentLocation.protocol + "//" + currentLocation.host + "/admin/login";
  document.getElementById("register_account").innerHTML = `
    <div>
        <p>Bạn đã đăng kí tài khoản thành công.</p>
        <p>vui long chờ một khoảng thời gian để admin duyệt.</p>
        <p>Chúng thôi sẽ thông báo lại cho bạn sau</p>
        <a href="`+currentLocation+`">Đăng nhập tại đây</a>
    </div>`;
}
