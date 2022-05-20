@extends('template.user')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/my_account.css') }}">
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
        <div class="form-info">
            <div class="avatar-preview">
                <div class="avatar">
                    <img src="{{ asset("images/avatar/" . Session::get('image')) }}" alt="{{ Session::get('name') }}">
                </div>
            </div>
            <div class="content-infor">
                <div class="name-infor">
                    Tên: {{ Session::get('name') }}
                </div>
                <div class="infor-content">
                    <p>
                        Email: {{ $user->email }}
                    </p>
                    <p>
                        <a href="{{ route('home.myCourse') }}" style="text-decoration: none; color:black">
                            Khóa học đã mua: {{ $user->number_buy }} khóa
                        </a>
                    </p>
                    <p>
                        Số tiền đã chi trả: 
                        {{ number_format($user->total_price, 0, '', ',') }} đ
                    </p>
                </div>
            </div>
        </div>
        <div class="action">
            <button>
                Chỉnh sửa thông tin cá nhân
            </button>
            <br>
            <button style="background-color:rgba(218, 19, 19, 0.623)">
                Thay đổi mật khẩu
            </button>
        </div>
    </div>
</div>
@stop

@section('js')
@stop
