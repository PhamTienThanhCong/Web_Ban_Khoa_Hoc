var currentLocation = window.location;
currentLocation = currentLocation.protocol + "//" + currentLocation.host;
let PageSellerWait = 0;
let PageSellerDone = 0;
let PageSellerBlock = 0;

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
  waitSeller(0);
  doneSeller(0);
  blockSeller(0);
});
// Gọi data
function waitSeller(page) {
  let link = currentLocation + "/api_admin/getSeller/wait/" + page + "";
  $.ajax({
    url: link,
    dataType: "json",
    success: function (response) {
      if (response.length == 0) {
        offBtn("see-more-wait-seller");
      } else {
        PageSellerWait += response.length;
        printSeller("wait-seller", response, "wait");
        if (response.length < 5) {
          offBtn("see-more-wait-seller");
        }
      }
    },
  });
}
function doneSeller(page) {
  let link = currentLocation + "/api_admin/getSeller/ok/" + page + "";
  $.ajax({
    url: link,
    dataType: "json",
    success: function (response) {
      if (response.length == 0) {
        offBtn("see-more-done-seller");
      } else {
        PageSellerDone += response.length;
        printSeller("done-seller", response, "done");
        if (response.length < 5) {
          offBtn("see-more-done-seller");
        }
      }
    },
  });
}
function blockSeller(page) {
  let link = currentLocation + "/api_admin/getSeller/block/" + page + "";
  $.ajax({
    url: link,
    dataType: "json",
    success: function (response) {
      if (response.length == 0) {
        offBtn("see-more-block-seller");
      } else {
        PageSellerBlock += response.length;
        printSeller("block-seller", response, "block");
        if (response.length < 5) {
          offBtn("see-more-block-seller");
        }
      }
    },
  });
}
// In thông tin
function printSeller(id, data, type) {
    if (type == "wait"){
        type = `
        <a class="trigger" data-type="accept" href="javascript:;">Duyệt</a>
        <br>
        <a class="trigger" data-type="delete" href="javascript:;">Từ chối</a>`;
    }else if (type == "done"){
        type = `
        <a class="trigger" data-type="block" href="javascript:;">Chặn</a>`;
    }else if (type == "block"){
      type = `
      <a class="trigger" data-type="unblock" href="javascript:;">Bỏ chặn</a>`;
  }
  for (let i = data.length - 1; i >= 0; i--) {
    document.getElementById(id).innerHTML +=
      `
        <tr id="wait-seller-` +
      data[i]["id"] +
      `">
            <td><img class="img-user-admin" src="` +
      currentLocation +
      `/public/images/avatar/` +
      data[i]["image"] +
      `" alt="" /></td>
            <td>` +
      data[i]["name"] +
      `</td>
            <td>` +
      data[i]["email"] +
      `</td>
            <td data-name="` +
      data[i]["name"] +
      `"
            data-email="` +
      data[i]["email"] +
      `"
            data-id="` +
      data[i]["id"] +
      `"
            data-description="` +
      data[i]["description"] +
      `"
            "style="text-align:center">
                `+ type +`
            </td>
            <td>` +
      data[i]["description"] +
      `</td>
        </tr>
        `;
  }
  readyAction();
}
// Tương tác các nút
function offBtn(id) {
  id = "#" + id;
  $(id).off("click");
  $(id).html("Đã tải hết");
  $(id).css("cursor", "not-allowed");
}
$("#see-more-done-seller").on("click", function () {
  doneSeller(PageSellerDone);
});
$("#see-more-wait-seller").on("click", function () {
  waitSeller(PageSellerWait);
});
// Tương tác các nút
function readyAction() {
  $(".trigger").off("click");
  $(".body").off("click");
  $(".trigger").on("click", function () {
    var value = this.parentNode;
    var alert = `Bạn có muốn ` + this.innerHTML + ` Tài khoản: ` + value.dataset.name + ``;
    $('#modal-name').html(alert);
    $('#modal-info').html(`
        <p>Tên: `+ value.dataset.name +`</p>
        <p>Email: `+ value.dataset.email +`</p>
        <p>Mô tả bản thân: `+ value.dataset.description +`</p>
    `);
    $('#id-seller').val(value.dataset.id);
    $('#id-type').val(this.dataset.type);
    $(".modal-wrapper").toggleClass("open");
    $(".page-wrapper").toggleClass("blur");
    return false;
  });
}
$('#submit-modal').on('submit', function(e) {
    e.preventDefault();
    var type= $('#id-type').val();
    var id = $('#id-seller').val();
    var link = currentLocation + "/api_admin/updateSeller/"+type;
    var selector = "#wait-seller-" + id + "";
    var html = "";
    $(".modal-wrapper").toggleClass("open");
    $.ajax({
      type: "POST",
      url: link,
      data: $(this).serializeArray(),
      dataType: "html",
      success: function (response) {
        console.log(response);
        html = $(selector).html();
        html = html.replace("trigger" , "trigger-none"); 
        $(selector).remove();
        if (type == "accept" || type == "unblock"){
          document.getElementById('done-seller').innerHTML += `
          <tr id="wait-seller-`+ id +`" >
          `+ html +`
          </tr>
          `;
        }else if (type == "block"){
          document.getElementById('block-seller').innerHTML += `
          <tr id="wait-seller-`+ id +`" >
          `+ html +`
          </tr>
          `;
        }
        toastr["success"]("Thành công");
        }
    });
})
