var loadFile = function (event) {
    var output = document.getElementById("img-preview");
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
      URL.revokeObjectURL(output.src); // free memory
    };
  };
  
  var changeTitle = function (event) {
    var output = document.getElementById("title-course");
    output.innerText = event.target.value;
  };
  var ChangePrice = function (event) {
    var output = document.getElementById("price-course");
    var x = parseInt(event.target.value);
    x = x.toLocaleString("it-IT", {
      style: "currency",
      currency: "VND",
    });
    console.log(x);
    output.innerHTML = "<i class='bx bxs-credit-card'></i> Giá thành: " + x;
  };
  
  function changeDescription() {
    document.getElementById("description-preview").innerHTML =  tinyMCE.activeEditor.getContent();
    document.getElementById("description-push").innerHTML = tinyMCE.activeEditor.getContent();
  }
  
  tinymce.init({
    selector: "#myTextarea",
    init_instance_callback: function (editor) {
      editor.on("Change", function (e) {
        changeDescription();
      });
    },
  });
  