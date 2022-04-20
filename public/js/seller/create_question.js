let typeQuestion = 1;
let numberQuestions = 1;


function addQuestion(){
    numberQuestions++;
    const node = document.createElement("div");
    node.classList.add("form-group");
    node.innerHTML = `
        <h5> 
        Câu trả lời ` + numberQuestions + `
        <a class="delete-question">
            Xóa câu trả lời
            <i class="mdi mdi-delete-forever"></i>
        </a>
        </h5>
        <input type="text" name="a" class="form-control" placeholder="Câu trả lời">
        <br>
            <p for="checktrue1" style="display:inline-block">Đây là câu trả lời </p>
            <select name="check" class="select-type-question">
                <option value="1">
                    Đúng
                </option>
                <option value="2">
                    Sai
                </option>
            </select>
        <br>`
    document.getElementById("form-question").appendChild(node);
}

function active(){
    $('.delete-question').off('click');
    $('.delete-question').on('click', function(){
        $(this).parent().parent().remove();
    })
}

function changeAnswer(){
    const value = $('.select-type-question');
    
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
        for (var i = 0; i < 1; i++) {
            addQuestion();
        }
    })
    $('exampleFormControlSelect').on('change',function(){
        typeQuestion = document.getElementById('exampleFormControlSelect').value;
        if(typeQuestion == '1'){

        }
    })
});