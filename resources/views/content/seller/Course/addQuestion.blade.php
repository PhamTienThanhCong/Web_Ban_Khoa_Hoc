@extends('template.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/create_question.css') }}">
@stop

@section('title')
    {{ $name_course }} Tạo Câu hỏi
@stop

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tạo câu hỏi mới bài: {{ $name_lesson }}</h4>
                <form class="forms-sample" id="form-create-question" method="post" action="{{ route('seller.addQuestionProcessing', [$course, $lesson]) }}">
                    <label for="">Loại câu hỏi: </label>
                    <select class="select-type-question" name="type_question" id="exampleFormControlSelect">
                        <option value="1">Câu hỏi có nhiều câu trả lời đúng</option>
                        <option value="2">Câu hỏi chỉ có một câu trả lời đúng</option>
                        <option value="3">Câu hỏi trả lời bằng văn bản</option>
                    </select>

                    @csrf

                    <div class="form-group mt-4">
                        <h5>Câu hỏi: </h5>
                        <input type="text" name="q" class="form-control" placeholder="Câu hỏi" required>
                    </div>
                    <div id="form-question">
                        <div class="form-group">
                            <h5> 
                                Câu trả lời 1
                                <a class="delete-question">
                                    Xóa câu trả lời
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </h5>
                            <input type="text" name="a1" class="form-control" placeholder="Câu trả lời" required>
                            <br>
                            <p for="checktrue1" style="display:inline-block">Đây là câu trả lời </p>
                            <select name="check1" class="select-type-answer">
                                <option value="1">
                                    Đúng
                                </option>
                                <option value="0">
                                    Sai
                                </option>
                            </select>
                            <br>
                        </div>
                    </div>
                    <input type="hidden" id="total-question" name="number_answer" value="1">
                    <button type="button" id="add-new-question" class="btn btn-gradient-success me-2">Thêm câu trả lời
                        +</button>
                    <button type="submit" class="btn btn-gradient-primary me-2">Tạo câu hỏi</button>
                    <button type="button" id="clear-all-question" class="btn btn-gradient-danger">clear</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/seller/create_question.js') }}"></script>
@stop
