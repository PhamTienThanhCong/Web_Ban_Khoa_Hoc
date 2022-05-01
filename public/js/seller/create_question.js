let typeQuestion = '1';
let numberQuestions = '1';

function changeQuestionText(){
    document.getElementById("form-question").innerHTML = `
        <h5>
            Câu trả lời:
        </h5>
        <textarea class="form-control" name="a1" rows="4" required></textarea>
        <input type="hidden" id="check1" name="check1" value="1">
        <br>
    `;
    $("#total-question").val(1);
}

function addQuestion(){
    numberQuestions++;
    $("#total-question").val(numberQuestions);
    const node = document.createElement("div");
    node.classList.add("form-group");
    node.innerHTML = `
        <h5> 
        Câu trả lời ${numberQuestions}
        <a class="delete-question">
            Xóa câu trả lời
            <i class="mdi mdi-delete-forever"></i>
        </a>
        </h5>
        <input type="text" name="a${numberQuestions}" class="form-control" placeholder="Câu trả lời" required>
        <br>
            <p for="checktrue1" style="display:inline-block">Đây là câu trả lời </p>
            <select name="check${numberQuestions}" class="select-type-answer">
            <option value="0">
                Sai
            </option>
            <option value="1">
                Đúng
            </option>
            </select>
        <br>`
    document.getElementById("form-question").appendChild(node);
    if (typeQuestion == '2'){
        activeOneAnswer();
    }
}

function active(){
    $('.delete-question').off('click');
    $('.delete-question').on('click', function(){
        $(this).parent().parent().remove();
    })
}

function activeOneAnswer(){
    $('.select-type-answer').off('change');
    $('.select-type-answer').on('change',function(){
        changeAnswer();
        this.value = 1;
    })
}

function changeAnswer(){
    const value = $('.select-type-answer');
    let i;
    for (i = 0; i < value.length ; i++) {
        value[i].value = 0;
    }    
}

function activateMultipleQuestions(){
    $('#add-new-question').off('click');
    active();
    $('#add-new-question').on('click',function(){
        addQuestion();
        active();
    })
}

$(document).ready(function () {
    activateMultipleQuestions();
    $('#clear-all-question').on('click',function(){
        $('#form-create-question')[0].reset();
        document.getElementById("form-question").innerHTML = "";
        numberQuestions = 0;
        for (var i = 0; i < 1; i++) {
            addQuestion();
        }
    })
    $('#exampleFormControlSelect').on('change',function(){
        if (typeQuestion == '3' && document.getElementById('exampleFormControlSelect').value != '3'){
            $('#form-create-question')[0].reset();
            document.getElementById("form-question").innerHTML = "";
            numberQuestions = 0;
            for (var i = 0; i < 1; i++) {
                addQuestion();
            }
        }
        typeQuestion = document.getElementById('exampleFormControlSelect').value;
        if (typeQuestion == '1'){
            activateMultipleQuestions();
            $('.select-type-answer').off('change');
        }else if (typeQuestion == '2'){
            activateMultipleQuestions()
            changeAnswer();
            $('.select-type-answer')[0].value = 1;
            activeOneAnswer();
        }else if (typeQuestion == '3'){
            $('#add-new-question').off('click');
            changeQuestionText();
        }
    })
});