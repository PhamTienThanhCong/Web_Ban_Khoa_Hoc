@extends('template.user')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/learn_course.css') }}">
    <style>
        #my-course {
            background-color: rgba(0, 0, 0, .2);
        }
    </style>
@stop

@section('title')
    {{ $lessons[$lesson_id]->name }}
@stop

@section('content')

<div class="grid">
    <div class="grid__row">
        <div class="lesson">
            <div class="video_lesson">
                <iframe width="100%" height="100%" src="{{ $lessons[$lesson_id]->link }}" ></iframe>
            </div>
            <div class="list_lesson">
                <a href="{{ route('home.nextLesson',[$course_id,$lesson_id+1]) }}">
                    <button class="btn-next-lesson">
                        Bài kế tiếp
                    </button>
                </a>
                <ul class="list_lesson_view">
                    @for ($i = 0; $i < count($lessons); $i++)
                        <li class="lessons">
                            @if ($i <  $number_learn)
                                <a href="{{ route('home.learnCourse', [$course_id,$i+1]) }}" style="text-decoration: none; color: black;">
                                    Bài {{$i + 1}}: {{ $lessons[$i]->name }}
                                </a>
                            @else
                                <a style="cursor: not-allowed;">
                                    Bài {{$i + 1}}: {{ $lessons[$i]->name }}
                                </a>
                            @endif
                            <span class="icon-check">
                                @if ($i ==  $lesson_id)
                                    <i class="fa-solid fa-eye"></i>
                                @elseif ($i + 1 <=  $number_learn)
                                    <i class="fa-solid fa-check"></i>    
                                @elseif ($i + 1 >  $number_learn)
                                    <i class="fa-solid fa-exclamation"></i>
                                @endif
                            </span>
                            <br>
                            @for ($j = 1 ; $j <= $lessons[$i]->number_question ; $j++)
                                <span class="icon-question">
                                    {{ $j }}
                                </span>
                            @endfor
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        <div>
            <div class="name-lesson">
                Bài học: {{ $lessons[$lesson_id]->name }}
            </div>
            <br>
            <div class="description-lesson">
                <h3 style="margin-bottom: 10px">
                    # Mô tả
                </h3>
                {{ $lessons[$lesson_id]->description }}
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
{{-- js here --}}
@stop
