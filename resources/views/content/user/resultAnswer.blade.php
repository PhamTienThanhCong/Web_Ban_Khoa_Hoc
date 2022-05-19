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
    Kết quả
@stop

@section('content')

    <div class="grid">
        <div class="grid__row">
            <div class="title-lesson">
                Thông báo kết quả
            </div>
            <div class="all-questions">'
                <div class="questions">
                    <div class="name-question">
                        Đánh giá năng lực bài số: {{ $lesson_id }}
                    </div>

                    <div class="name-answers">
                        <div class="one-answer">
                            <label for="">
                                Bạn đã trả lời được: 
                                {{ $true_number }} / {{ $false_number + $true_number }} 
                                Câu
                            </label>
                            <br><br>
                            @if ($true_number > $false_number)
                                <label for="">
                                    Chúc mừng bạn đã vượt qua bài đánh giá
                                </label>
                            @else
                                <label for="">
                                    Rất tiếc bạn chưa vượt qua được bài đánh giá
                                </label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="questions">
                @if ($true_number > $false_number)
                    <a href="{{ route('home.learnCourse', [$course_id, $lesson_id+1]) }}">
                        <button class="btn-submit">
                            Sang bài mới
                        </button>
                    </a>
                @else
                    <a href="{{ route('home.learnCourse', [$course_id, $lesson_id]) }}">
                        <button class="btn-submit">
                            Xem lại bài học và kiểm tra
                        </button>
                    </a>
                @endif
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('js')
        {{-- js here --}}
    @stop
