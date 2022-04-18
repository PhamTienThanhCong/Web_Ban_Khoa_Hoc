let numberQuestions = 4;

function addQuestion(){
    numberQuestions++;
    document.getElementById("form-question").innerHTML += `
        <div class="form-group">
            <h5> 
                Câu trả lời ` + numberQuestions + `
                <a class="delete-question">
                    Xóa câu trả lời
                    <i class="mdi mdi-delete-forever"></i>
                </a>
            </h5>
            <input type="text" name="a" class="form-control" placeholder="Câu trả lời">
            <br>
            <input type="checkbox" name="check" id="checkbox` + numberQuestions + `">
            <label for="checkbox` + numberQuestions + `">Đây là câu trả lời đúng </label>
            <br>
        </div>
    `;
}

function active(){
    $('.delete-question').off('click');
    $('.delete-question').on('click', function(){
        $(this).parent().parent().remove();
    })
}

$(document).ready(function () {
    active();
    $('#add-new-question').on('click',function(){
        addQuestion();
        active();
    })
    $('#clear-all-question').on('click',function(){
        $('#form-create-question')[0].reset();
        document.getElementById("form-question").innerHTML = "";
        numberQuestions = 0;
        for (var i = 0; i < 4; i++) {
            addQuestion();
        }
    })
});