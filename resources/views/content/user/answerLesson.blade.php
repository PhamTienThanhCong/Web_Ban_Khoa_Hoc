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
            Bài: {{ $lesson->name }}
        </div>
        <form method="post" action="{{ route('home.checkAnswer',[$course_id, $lesson_id]) }}" class="all-questions">'
            <input type="hidden" name="id_lesson" value="{{ $lesson->id }}">
            @csrf
            <?php
                $id_question = 0;
                $number_answer = 1;
                $number_question = 1;
            ?>
            <div><div>
            @foreach ($questions as $question)
                @if ($question->id != $id_question)
                    </div></div>
                    <div class="questions">
                        <div class="name-question">
                            Câu {{ $number_question++ }}: {{ $question->question }}
                        </div>
                    <?php
                        $id_question = $question->id;
                        $number_answer = 1;
                    ?>
                    <div class="name-answers">
                @endif
                <div class="one-answer">
                    @if ($question->type == 1)
                        <input type="checkbox" id="{{ $question->id_answer }}" name="a{{ $question->id_answer }}">
                    @elseif ($question->type == 2)
                        <input type="radio" id="{{ $question->id_answer }}" name="{{ $question->id }}" value="{{ $question->id_answer }}">
                    @endif
                    <label for="{{ $question->id_answer }}">
                        Câu {{ $number_answer++ }}:
                        {{ $question->answer }} 
                    </label>
                </div>
                @endforeach
                </div>
            </div>

            <div class="questions">
                <button class="btn-submit">
                    Nộp bài
                </button>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
{{-- js here --}}
@stop
