@extends('template.admin')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Khóa Học {{ $name_course }} Tạo Bài học mới
@stop

@section('content')

    {{-- Thêm khóa học --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tạo bài học mới</h4>
                <form class="forms-sample" method="post" action="{{ route('seller.addLessonProcessing', $course) }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên bài học</label>
                        <input type="text" name="name" class="form-control" id="inputNameLesson" placeholder="Nhập tên bài học">
                    </div>
                    <div class="form-group">
                        <label for="link-input">Link bài học</label>
                        <input type="text" class="form-control" id="link-input"
                            placeholder="Đường dẫn bài học">
                        <input type="hidden" name="link" id="target-link">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Loại link</label>
                        <select class="form-control" id="selectLinkType">
                            <option value="1">Link youtube</option>
                            <option value="2">Link driver</option>
                            <option value="3">Link khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả bài học</label>
                        <textarea class="form-control" name="description" id="textareaLesson" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="create_question">Tạo câu hỏi ngay</label>
                        <input type="checkbox" name="create_question" id="create_question">
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    {{-- end Thêm khóa học --}}

    {{-- Xem Truoc --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Xem trước khóa học</h4>
                {{-- <iframe src="" frameborder="0"></iframe> --}}
                <iframe id="preview-video" width="100%" height="430" src="https://www.youtube.com/embed/D5vwR-bnLu8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h3 id="preview-name">
                    Tên khóa học
                </h3>
                <br>
                <p id="preview-description">
                    Mô tả thui
                </p>
            </div>
        </div>
    </div>
    {{-- Xem truoc --}}

@stop

@section('js')
    <script src="{{ asset('js/seller/create_lesson.js') }}"></script>
@stop
