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
    Trả lời câu hỏi
@stop

@section('content')

<div class="grid">
    <div class="grid__row">
        <div class="title-lesson">
            Bài học: gì gì đó
        </div>
        <div class="all-questions">
            <div class="questions">
                <div class="name-question">
                    Câu 1: câu gì đó
                </div>
                <div class="name-answers">
                    <div class="one-answer">
                        <input type="checkbox">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                    <div class="one-answer">
                        <input type="radio">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                    <div class="one-answer">
                        <input type="checkbox">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                </div>
            </div>

            <div class="questions">
                <div class="name-question">
                    Câu 1: câu gì đó
                </div>
                <div class="name-answers">
                    <div class="one-answer">
                        <input type="checkbox">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                    <div class="one-answer">
                        <input type="radio">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                    <div class="one-answer">
                        <input type="checkbox">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                </div>
            </div>

            <div class="questions">
                <div class="name-question">
                    Câu 1: câu gì đó
                </div>
                <div class="name-answers">
                    <div class="one-answer">
                        <input type="checkbox">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                    <div class="one-answer">
                        <input type="radio">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                    <div class="one-answer">
                        <input type="checkbox">
                        <label for="">Câu 1: câu gì đó</label>
                    </div>
                </div>
            </div>
            <div class="questions">
                <button class="btn-submit">
                    Nộp bài
                </button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
{{-- js here --}}
@stop
