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
        src="https://th.bing.com/th/id/R.509f2760a9955ef5d20d2c37a2e03d83?rik=0TubJc1s9uxbNA&pid=ImgRaw&r=0"
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
