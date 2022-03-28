function edit() {
    var a = document.getElementById("user-in4").innerHTML;
    a = a.replaceAll("readonly=", "");
    a = a.replaceAll("hidden-lable", "");
    a = a.replaceAll("textarea-view", "textarea-edit");
    a = a.replace('<input type="hidden" id="img" name="image">', '<label for="img">Ảnh mới: </label><input type="file" id="img" name="image" onchange="loadFile(event)">')
    a = a.replace('<button id="btn" type="button" onclick="edit()">Sửa</button>', '<button id="btn">Lưu lại</button>')
    document.getElementById("user-in4").innerHTML = a;
    document.getElementById("btn").style.backgroundColor = "red";
    for (let i = 1; i < 5; i++) {
        document.getElementsByTagName('input')[i].style.borderBottom = "1px solid #004080";
    }
}
var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};
var currentLocation = window.location;
currentLocation = currentLocation.protocol + "//" + currentLocation.host;
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
    $('#change-danger').click(function () {
        document.getElementById('my-password').style.display = 'inline-block';
        document.getElementById('change-danger').style.display = 'none';
    })
    $('#my-password').on('submit', function (e) {
        e.preventDefault();
        let check = true;
        let link = currentLocation + "/account/update_account_password";
        if ($('#new-password').val().trim() == ''){
            toastr["error"](
                "Các ô nhập <br/>Không được để trống"
              );
              check = false;
        }
        if ($('#new-password').val() != $('#confirm-password').val()) {
            toastr["error"](
                "Mật khẩu không trùng<br/>Vui lòng nhập lại"
              );
              check = false;
        }
        if (check) {
            $.ajax({
                type: "POST",
                url: link,
                data: $(this).serializeArray(),
                dataType: "html",
                success: function (response) {
                    if (response == "0"){
                        toastr["error"]("Mật khẩu cũ không đúng");
                    }else if (response == "1"){
                        toastr["success"]("Đổi mật khẩu thành công");
                        document.getElementById('my-password').style.display = 'none';
                        document.getElementById('change-danger').style.display = 'inline-block';
                    }
                }
            });
        }
    })
});