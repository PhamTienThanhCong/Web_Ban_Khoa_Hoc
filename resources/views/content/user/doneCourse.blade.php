@extends('template.user')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/answer_lesson.css') }}">
    <style>
        #my-course {
            background-color: rgba(0, 0, 0, .2);
        }

    </style>
@stop

@section('title')
    Hoàn thành: {{ $course->name }}
@stop

@section('content')

    <div class="grid">
        <div class="grid__row">
            <div class="title-lesson">
                Chúc mừng hoàn thành khóa học
            </div>
            <div class="all-questions">'
                <div class="questions">
                    <div class="name-question">
                        Khóa học: {{ $course->name }}
                    </div>

                    <div class="name-answers">
                        <div class="one-answer">
                            <label for="">
                                Giảng viên: {{ $course->name_admin }}
                            </label>
                            <br><br>
                            <label for="">
                                Số lượng bài học: {{ $course->number_lesson }}
                            </label>
                            <br><br>
                            <label for="">
                                Học viên: {{ Session::get('name') }}
                            </label>
                            <br><br>
                        </div>
                    </div>
                </div>

                <div class="questions">
                    <a href="#">
                        <button class="btn-submit">
                            Thi lấy chứng chỉ
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('js')
        {{-- js here --}}
    @stop
