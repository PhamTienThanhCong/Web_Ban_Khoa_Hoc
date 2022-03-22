let link = "X57xjcih8Hk";
let type = "1";

function convertLink(typeLink) {
  var sortLink = "";
  var link = document.getElementById("link-lesson").value;
  if (typeLink == 1) {
    link = link.split("watch?v=")[1];
    sortLink = link.split("&list=")[0];
  } else if (typeLink == 2) {
    link = link.split("/file/d/")[1];
    sortLink = link.split("/view?")[0];
  } else {
    sortLink = link;
  }
  return sortLink;
}
function PreviewVideo(link, typeLink) {
  var NewLink = "";
  if (typeLink == "1") {
    NewLink = "https://www.youtube.com/embed/" + link + "";
  } else if (typeLink == "2") {
    NewLink = "https://drive.google.com/file/d/" + link + "/preview";
  } else {
    NewLink = sortLink;
  }
  document.getElementById("video-lesson-preview").src = NewLink;
}

var changeTitleLesson = function (event) {
  var output = document.getElementById("title-lesson-preview");
  output.innerText = event.target.value;
};
function changeLink() {
  link = convertLink(type);
  PreviewVideo(link, type);
}
var changeTypeLink = function (event) {
  type = event.target.value;
  changeLink();
};

// Mô tả
function showDescriptionLesson() {
  document.getElementById("description-lesson-preview").innerHTML =
    tinyMCE.activeEditor.getContent();
}
var tiny = tinymce.init({
  selector: "#myTextareaLesson",
  init_instance_callback: function (editor) {
    editor.on("Change", function (e) {
      showDescriptionLesson();
    });
  },
});
// Mô tả

function resetForm(){
    var newForm = document.getElementById('edit-lesson');
    newForm.reset();
}

var ShowPreviewLesson = function (event) {
    var nameBtn = event.target.innerText;
    if (nameBtn == "Ẩn bản Demo"){
        event.target.innerText = "Xem bản demo";
        document.getElementById("previewLesson").style.display = "none";
    }else if (nameBtn == "Xem bản demo"){
        event.target.innerText = "Ẩn bản Demo";
        document.getElementById("previewLesson").style.display = "block";
    }
};