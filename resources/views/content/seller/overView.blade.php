@extends('template.seller')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Tổng quan
@stop

@section('content')

    {{-- Bắt đầu cục tổng quan --}}
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('img/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Tổng thu nhập <i
                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">51.155.000 đ</h2>
                    <h6 class="card-text">Giảm khoảng 10%</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('img/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Khóa học đã bán<i
                            class="mdi mdi-cart-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">14 Khóa</h2>
                    <h6 class="card-text">Tăng khoảng 30%</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('img/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Số yêu cầu đang chờ <i
                            class="mdi mdi-alert-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">9.741</h2>
                    <h6 class="card-text">Tăng khoảng 5%</h6>
                </div>
            </div>
        </div>
    </div>
    {{-- Kết thúc cục tổng quan --}}

    {{-- Bắt đầu biểu đồ thu nhập --}}
    <div class="card" style="margin-bottom: 40px">
        <div class="card-body">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <h4 class="card-title">Tổng quan thu nhập</h4>
            <canvas id="line-chart-seller" style="height: 407px; display: block; width: 815px;" width="815" height="407"
                class="chartjs-render-monitor"></canvas>
        </div>
    </div>
    {{-- Kết thúc biểu đồ thu nhập --}}

    {{-- Bắt đầu biểu đồ thu nhập --}}
    <div class="card" style="margin-bottom: 40px">
        <div class="card-body">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <h4 class="card-title">Tổng quan thu nhập</h4>
            <canvas id="line-chart-seller-course" style="height: 407px; display: block; width: 815px;" width="815" height="407"
                class="chartjs-render-monitor"></canvas>
        </div>
    </div>
    {{-- Kết thúc biểu đồ thu nhập --}}

    {{-- Bắt đầu bảng khóa học --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Top 10 khóa học bán chạy nhất</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> Tên khóa </th>
                        <th> Giá </th>
                        <th> Đã bán </th>
                        <th> Thu nhập </th>
                        <th> Cập nhập lần cuối </th>
                        <th> Xem </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Khóa học làm web cho người mới bắt đầu </td>
                        <td> $ 77.99 </td>
                        <td> 14 </td>
                        <td> 1.123.123 đ </td>
                        <td> May 15, 2015 </td>
                        <th>
                            <a href="#">
                                xem
                            </a>
                        </th>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    {{-- Kết thúc bảng khóa học --}}
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{ asset('js/admin/chart_demo_seller.js') }}"></script>
@stop
