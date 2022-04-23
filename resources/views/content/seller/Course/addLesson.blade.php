@extends('template.seller')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Tạo Bài học mới
@stop

@section('content')
    {{-- Tên trang --}}
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-border-color"></i>
            </span> Tạo bài học của khóa {{ $course }}
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Tạo bài học của khóa {{ $course }} <i
                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    {{-- Tên trang --}}

    {{-- Thêm khóa học --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tạo bài học mới</h4>
                <form class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên bài học</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên bài học">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Link bài học</label>
                        <input type="text" class="form-control" id="exampleInputPassword4"
                            placeholder="Đường dẫn bài học">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Loại link</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option value="">Link youtube</option>
                            <option value="">Link driver</option>
                            <option value="">Link khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả bài học</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    {{-- end Thêm khóa học --}}

@stop

@section('js')
    {{-- js code --}}
@stop
