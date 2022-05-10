@extends('template.user')

@section('css')
    {{-- Css code --}}
    <style>
        #my-cart {
            background-color: rgba(0, 0, 0, .2);
        }

    </style>
@stop

@section('title')
    Giỏ hàng của tôi
@stop

@section('content')
    <div class="grid">
        <div class="page-content">
            <div class="page">
                <div class="content">
                    <h2>Thông tin giỏ hàng của bạn </h2>
                </div>
                <table id="table_gio_hang">
                    <tr class="header-table">
                        <th class="header_ten"> Tên </th>
                        <th class="header_tacgia"> Tác Giả </th>

                        <th class="header_gia"> Giá </th>
                        <th class="header_tuong_tac"> Huỷ</th>
                        <th class="header_mua"> Mua </th>
                    </tr>
                    <tr>
                        <th>phong</th>
                        <th>vip pro no 1 </th>
                        <th>1000000$</th>
                        <th><a href="#">xoá</a> </th>
                        <th>
                            <input type="hidden" class="value" value="36">
                            <input class="check-value" type="checkbox">
                            <input type="hidden" class="value" value="36">
                        </th>
                    </tr>

                </table>
                <h3>Tổng tiền: <span>0</span>VND</h3>
                <div class="content_mid_table">
                    <p>Bạn ơi giỏ hàng của bạn đang trống kìa hãy lụm thêm vài sản phẩm vào nào !!!</p>
                    <p>Bạn có thể xem sản phẩm <a href="{{ route('home.course') }}">Tại đây</a> </p>
                </div>
            </div>

            <div>
                <div class="page_right">
                    <div calss="test">
                        <div class="table1">
                            <h2>Thông tin thanh toán</h2>
                            @if (!Session::has('id'))
                                <p>Chưa có thông tin bạn phải đăng nhập</p>
                                <p>Bạn có thể đăng nhập <a href="{{ route('user.login') }}">Tại đây</a></p>
                            @else
                                <div>
                                    <span>Tên : <span>{{ Session::get('name') }}</span></span><br>
                                    <span>Số tài khoản: <span>0381 0053 501</span></span><br>
                                    <span>Ngân hàng <span>Tiên Phong (TpBank) </span></span>
                                </div>
                            @endif
                        </div>
                        <div class="table2">
                            <h2>Thông tin về mặt hàng</h2>
                            <p></p>
                            <p>Số tiền phải trả : 0</p>
                            <p>Số lượng bài học bạn đã mua: 0</p>
                        </div>
                    </div>
                    <form id="mua">
                        <input type="hidden">
                        <button
                        @if (!Session::has('id'))
                            type="button" onclick="alert('Ban Phai Dang Nhap')"
                        @endif
                        >Mua</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop
