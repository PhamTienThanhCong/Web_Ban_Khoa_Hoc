@extends('template.seller')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/create_question.css') }}">
@stop

@section('title')
    Tạo Câu hỏi
@stop

@section('content')
    {{-- Tên trang --}}
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-border-color"></i>
            </span> Tạo Chỉnh sửa câu hỏi
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Khóa học {{ $course }}<i
                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    {{-- Tên trang --}}

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tạo câu hỏi mới</h4>
                <form class="forms-sample" id="form-create-question">
                    <label for="">Loại câu hỏi: </label>
                    <select class="select-type-question" id="exampleFormControlSelect2">
                        <option value="1">Câu hỏi nhiều câu trả lời</option>
                        <option value="2">Câu hỏi nhiều chỉ có một câu trả lời</option>
                        <option value="3">Câu hỏi trả lời bằng text</option>
                    </select>
                    
                    <div class="form-group mt-4">
                        <h5>Câu hỏi: </h5>
                        <input type="text" name="q" class="form-control" placeholder="Câu hỏi">
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
                            <br>
                        </div>
                        
                    </div>
                    
                    <button type="button" id="add-new-question" class="btn btn-gradient-success me-2">Thêm câu trả lời +</button>
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
