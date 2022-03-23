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
    if ((document.getElementById("description").value).trim() == ""){
        check = false;
        toastr["error"]("Mô tả không thể để trống");
    }
    if (check) {
        var currentLocation = window.location;
        currentLocationHome =
            currentLocation.protocol + "//" + currentLocation.host + "/home/overview";
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
            console.log(response);
            },
        });
    }
  });
});
