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
$(document).ready(function () {
    $('#change-danger').click(function () {
        document.getElementById('my-password').style.display = 'inline-block';
        document.getElementById('change-danger').style.display = 'none';
    })
});