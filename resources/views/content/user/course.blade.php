@extends('template.user')

@section('css')
    {{-- Css code --}}
    <style>
        #course{
            background-color: rgba(0, 0, 0, .2);
        }
    </style>
@stop

@section('title')
    Khóa học
@stop

@section('content')
    <img class="main-img" width="95%" height="350px"
        src="https://scontent.fhan2-2.fna.fbcdn.net/v/t1.15752-9/277114640_1666431013724170_5404558021918161449_n.png?_nc_cat=110&ccb=1-5&_nc_sid=ae9488&_nc_ohc=grUPfb2vV3UAX_V3vRE&_nc_ht=scontent.fhan2-2.fna&oh=03_AVKkfphCFlpUJkl163-OpncIR1jxWpcxRH-9zdaKaWkfxw&oe=628364ED"
        alt="">
    <div class="grid">
        <div class="grid__row">
            @foreach ($courses as $course)
                <div class="grid__column-3">
                    <div class="product-item">
                        <a href="{{ route('home.viewCourse', $course->id) }}">
                            <div class="product-item-img"
                                style="background-image: url({{ asset("images/" . $course->image) }});">
                            </div>
                            <br>
                            <div class="product-item-name">{{ $course->name }}</div>
                        </a>
                        <div class="product-des">
                            <span><i class="fa-brands fa-youtube"></i>Tổng số bài học: {{ $course->number_lesson }}</span>
                            <span><i class="fa-solid fa-user"></i>Tác giả: {{ $course->name_admin }}</span>
                            <span><i class="fa-solid fa-id-card"></i>Giá: {{ $course->price }} VND</span>
                        </div>
                        <button class="btn-click"><a href="{{ route('home.viewCourse', $course->id) }}">Xem chi tiết</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $courses->links() }}
@stop

@section('js')
@stop
