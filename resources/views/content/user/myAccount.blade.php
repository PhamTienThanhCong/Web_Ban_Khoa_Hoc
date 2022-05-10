@extends('template.user')

@section('css')
    {{-- Css code --}}
    <style>
        #my-account{
            background-color: rgba(0, 0, 0, .2);
        }
    </style>
@stop

@section('title')
    Tài khoản của tôi
@stop

@section('content')
<div class="grid">
    <div class="grid__row">
        <div class="grid__column-3">
            <div class="product-item">
                <a href="">
                    <div class="product-item-img"
                        style="background-image: url(https://shopkhoahoccong.000webhostapp.com/public/images/upload/Kh%C3%B3a%20h%E1%BB%8Dc%20html-css-javascript-php%201642081103.png);">
                    </div>
                    <div class="product-item-name">Khóa HỌC JAVASCRIPT</div>
                </a>
                <div class="product-des">
                    <span><i class="fa-brands fa-youtube"></i>Tổng số bài học: 35</span>
                    <span><i class="fa-solid fa-user"></i>Tác giả: Nguyễn Nam Long</span>
                    <span><i class="fa-solid fa-id-card"></i>Giá: 950.000 VND</span>
                </div>
                <button class="btn-click"><a href="">Xem chi tiết</a></button>
            </div>
        </div>
        <div class="grid__column-3">
            <div class="product-item">
                <a href="">
                    <div class="product-item-img"
                        style="background-image: url(https://shopkhoahoccong.000webhostapp.com/public/images/upload/Kh%C3%B3a%20h%E1%BB%8Dc%20html-css-javascript-php%201642081103.png);">
                    </div>
                    <div class="product-item-name">Khóa HỌC JAVASCRIPT</div>
                </a>
                <div class="product-des">
                    <span>Tổng số bài học: 35</span>
                    <span>Tác giả: Nguyễn Nam Long</span>
                    <span>Giá: 950.000 VND</span>
                </div>
                <button class="btn-click"><a href="">Xem chi tiết</a></button>
            </div>
        </div>
        <div class="grid__column-3">
            <div class="product-item">
                <a href="">
                    <div class="product-item-img"
                        style="background-image: url(https://shopkhoahoccong.000webhostapp.com/public/images/upload/Kh%C3%B3a%20h%E1%BB%8Dc%20html-css-javascript-php%201642081103.png);">
                    </div>
                    <div class="product-item-name">Khóa HỌC JAVASCRIPT</div>
                </a>
                <div class="product-des">
                    <span>Tổng số bài học: 35</span>
                    <span>Tác giả: Nguyễn Nam Long</span>
                    <span>Giá: 950.000 VND</span>
                </div>
                <button class="btn-click"><a href="">Xem chi tiết</a></button>
            </div>
        </div>
        <div class="grid__column-3">
            <div class="product-item">
                <a href="">
                    <div class="product-item-img"
                        style="background-image: url(https://shopkhoahoccong.000webhostapp.com/public/images/upload/Kh%C3%B3a%20h%E1%BB%8Dc%20html-css-javascript-php%201642081103.png);">
                    </div>
                    <div class="product-item-name">Khóa HỌC JAVASCRIPT</div>
                </a>
                <div class="product-des">
                    <span>Tổng số bài học: 35</span>
                    <span>Tác giả: Nguyễn Nam Long</span>
                    <span>Giá: 950.000 VND</span>
                </div>
                <button class="btn-click"><a href="">Xem chi tiết</a></button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
@stop
