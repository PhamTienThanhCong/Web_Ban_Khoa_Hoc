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
                    <div class="form-group">
                        <label for="">Câu hỏi</label>
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
                            <input type="checkbox" name="check" id="checkbox1">
                            <label for="checkbox1">Đây là câu trả lời đúng </label>
                            <br>
                        </div>
                        <div class="form-group">
                            <h5> 
                                Câu trả lời 2
                                <a class="delete-question">
                                    Xóa câu trả lời
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </h5>
                            <input type="text" name="a" class="form-control" placeholder="Câu trả lời">
                            <br>
                            <input type="checkbox" name="check" id="checkbox2">
                            <label for="checkbox2">Đây là câu trả lời đúng </label>
                            <br>
                        </div>
                        <div class="form-group">
                            <h5> 
                                Câu trả lời 3
                                <a class="delete-question">
                                    Xóa câu trả lời
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </h5>
                            <input type="text" name="a" class="form-control" placeholder="Câu trả lời">
                            <br>
                            <input type="checkbox" name="check" id="checkbox3">
                            <label for="checkbox3">Đây là câu trả lời đúng </label>
                            <br>
                        </div>
                        <div class="form-group">
                            <h5> 
                                Câu trả lời 4
                                <a class="delete-question">
                                    Xóa câu trả lời
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </h5>
                            <input type="text" name="a" class="form-control" placeholder="Câu trả lời">
                            <br>
                            <input type="checkbox" name="check" id="checkbox4">
                            <label for="checkbox4">Đây là câu trả lời đúng </label>
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
