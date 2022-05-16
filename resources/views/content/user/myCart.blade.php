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
                @if (Session::has('id_course'))
                <table id="table_gio_hang">
                    <tr class="header-table">
                        <th>#</th>
                        <th class="header_ten"> Tên </th>
                        <th class="header_tacgia"> Tác Giả </th>

                        <th class="header_gia"> Giá </th>
                        <th class="header_tuong_tac"> Huỷ</th>
                        <th class="header_mua"> Mua </th>
                    </tr>
                    @for ($i = 0; $i < count(Session::get('id_course')); $i++)
                        <tr>
                            <th> {{ $i + 1 }} </th>
                            <th> 
                                <a style="color: black; text-decoration: none" href="{{ route('home.viewCourse', Session::get('id_course')[$i]) }}">{{ Session::get('name_course')[$i] }}</a>
                            </th>
                            <th> {{ Session::get('author_course')[$i] }} </th>
                            <th> {{ Session::get('price_course')[$i] }} VND</th>
                            <th><a href="{{ route('home.unOrderCourse', Session::get('id_course')[$i]) }}">xoá</a></th>
                            <th data-id={{ Session::get('id_course')[$i] }} data-price={{ Session::get('price_course')[$i] }}>
                                <input class="check-value" type="checkbox">
                            </th>
                        </tr>
                    @endfor
                </table>
                <h3>Tổng tiền: <span id="price-total">0</span>VND</h3>   
                @else
                    <div class="content_mid_table">
                        <p>Bạn ơi giỏ hàng của bạn đang trống kìa hãy lụm thêm vài sản phẩm vào nào !!!</p>
                        <p>Bạn có thể xem sản phẩm <a href="{{ route('home.course') }}">Tại đây</a> </p>
                    </div>
                @endif
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
                            <p id="total-price-account">Số tiền phải trả : 0</p>
                            <p id="total-course-account">Số lượng bài học bạn sẽ mua: 0</p>
                        </div>
                    </div>
                    <form id="mua" method="post" action="{{ route('home.buyCourse') }}">
                        @csrf
                        <input name="id-buy" id="id-buy" type="hidden">
                        <input name="id-not-buy" id="id-not-buy" type="hidden">
                        <button id="btn-buy"
                        @if (!Session::has('id'))
                            type="button" onclick="alert('Ban Phai Dang Nhap')"
                        @endif
                        style="cursor: not-allowed"
                        type="button"
                        >Mua</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let id = [];
    let total_price = 0;
    let not_buy = [
        @if (Session::has('id_course'))
            @for ($i = 0; $i < count(Session::get('id_course')); $i++)
                {{ Session::get('id_course')[$i] }},
            @endfor
        @endif
    ];

    function getIndex(arr = [], n) {
        for (let i = 0; i < arr.length; i++) {
            if (arr[i] == n){
                return i;
            }
        }
        return -1;
    }

    $(document).ready(function () {
        document.getElementById("id-not-buy").value = not_buy;
        $('.check-value').on('click', function () {
            var price = parseInt($(this.parentNode).attr('data-price'));
            var id_course = parseInt($(this.parentNode).attr('data-id'));
            if (getIndex(id, id_course) == -1){
                not_buy.splice(getIndex(not_buy, id_course), 1)
                id.push(id_course);
                total_price += price;
            }else{
                id.splice(getIndex(id, id_course), 1);
                not_buy.push(id_course)
                total_price -= price;
            }
            document.getElementById("price-total").innerHTML = total_price; 
            document.getElementById("total-price-account").innerHTML = "Số tiền phải trả : " + total_price;
            document.getElementById("total-course-account").innerHTML = "Số lượng bài học bạn sẽ mua: " + id.length;
            document.getElementById("id-buy").value = id;
            document.getElementById("id-not-buy").value = not_buy;
            if (id.length == 0){
                document.getElementById("btn-buy").style.cursor = "not-allowed";
                document.getElementById("btn-buy").setAttribute('type','button');
            }else{
                document.getElementById("btn-buy").style.cursor = "pointer";
                document.getElementById("btn-buy").setAttribute('type','submit');
            }
        })
    });
</script>
@stop
