var currentLocation = window.location;
currentLocation = currentLocation.protocol + "//" + currentLocation.host;
let PageSellerWait = 0;
let PageSellerDone = 0;

$(document).ready(function () {
  waitSeller(0);
  doneSeller(0);
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
        printSeller("wait-seller", response);
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
        printSeller("done-seller", response);
        if (response.length < 5) {
          offBtn("see-more-done-seller");
        }
      }
    },
  });
}
// In thông tin
function printSeller(id, data) {
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
            <td style="text-align:center">
            <a href="">Duyệt</a>
            <br>
            <a href="">Từ chối</a>
            </td>
            <td>` +
      data[i]["description"] +
      `</td>
        </tr>
        `;
  }
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
