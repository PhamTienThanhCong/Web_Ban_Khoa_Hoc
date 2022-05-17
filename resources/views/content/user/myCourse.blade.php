@extends('template.user')

@section('css')
    {{-- Css code --}}
    <style>
        #my-course {
            background-color: rgba(0, 0, 0, .2);
        }

    </style>
@stop

@section('title')
    Khóa học đã mua
@stop

@section('content')
    <h2 class="product-header">
        Khóa học của tôi
    </h2>
    <br>
    @if (count($courses)>0)
        <div class="grid">
            <div class="grid__row">
                @foreach ($courses as $course)
                    <div class="grid__column-3">
                        <div class="product-item">
                            <a href="{{ route('home.viewCourse', $course->id) }}">
                                <div class="product-item-img"
                                    style="background-image: url({{ asset('images/' . $course->image) }});">
                                </div>
                                <br>
                                <div class="product-item-name">{{ $course->name }}</div>
                            </a>
                            <div class="product-des">
                                <span><i class="fa-brands fa-youtube"></i>Tổng số bài học: {{ $course->number_lesson }}</span>
                                <span><i class="fa-solid fa-user"></i>Tác giả: {{ $course->name_admin }}</span>
                                <span><i class="fa-solid fa-id-card"></i>Giá: {{ $course->price }} VND</span>
                            </div>
                            <button class="btn-click"><a href="{{ route('home.learnCourse', [$course->id,1]) }}">Vào học ngay</a></button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $courses->links() }}
    @else
        <h2>
            Bạn Chưa mua khóa học nào cả, Mua ngay
            <a href="{{ route('home.course') }}">Tại đây</a>
        </h2>
    @endif
    
@stop

@section('js')
@stop
