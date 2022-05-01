let type = "1";

function processLink(){
    let link = $('#link-input').val();
    if (type == "1"){
        link = link.split("?v=")[1];
        link = link.split("&t=")[0];
        link = "https://www.youtube.com/embed/"+link;
    }else if(type == "2"){
        // https://drive.google.com/file/d/1VX_znhxjbhwHmlziO7G1RzvnRhYgGAAC/view?usp=sharing
        // https://drive.google.com/file/d/1VX_znhxjbhwHmlziO7G1RzvnRhYgGAAC/preview
        link = link.split("/view")[0];
        link = link + "/preview";
    }
    return link;
}

function updateLink(){
    $("#target-link").val(processLink());
    $("#preview-video").attr("src",processLink());
}
$(document).ready(function () {
    $("#link-input").on("change", function(){
        updateLink();
    });
    $("#selectLinkType").on("change", function(){
        type = $("#selectLinkType").val();
        updateLink();
    });
    $("#inputNameLesson").on("change", function(){
        $("#preview-name").html($("#inputNameLesson").val());
    });
    $("#textareaLesson").on("change", function(){
        $("#preview-description").html($("#textareaLesson").val());
    });
});