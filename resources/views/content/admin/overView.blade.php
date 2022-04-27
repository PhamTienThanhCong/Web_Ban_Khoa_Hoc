@extends('template.admin')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Tổng quan
@stop

@section('content')
    {{-- Bắt đầu Tên Trang --}}
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Tổng quan
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Tổng quan về trang <i
                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    {{-- Kết Thúc tên trang --}}

    {{-- Bắt đầu cục tổng quan --}}
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('img/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Tổng thu nhập <i
                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">1.155.421.000 đ</h2>
                    <h6 class="card-text">Giảm khoảng 60%</h6>
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
                    <h2 class="mb-5">454 Khóa</h2>
                    <h6 class="card-text">Tăng khoảng 30%</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('img/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Người dùng <i
                            class="mdi mdi-account-star mdi-24px float-right"></i>
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
            <h4 class="card-title">Thu nhập chung</h4>
            <canvas id="line-chart" style="height: 407px; display: block; width: 815px;" width="815" height="407"
                class="chartjs-render-monitor"></canvas>
        </div>
    </div>
    {{-- Kết thúc biểu đồ thu nhập --}}

    {{-- Bắt đầu bảng nhân viên --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Top 10 nhân viên xuất xắc nhất</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Ảnh </th>
                            <th> Họ Tên </th>
                            <th style="text-align: center"> Tổng khóa học </th>
                            <th> Thu nhập </th>
                            <th> Ngày tham gia </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-1">
                                <img src="{{ asset('img/profile.jpg') }}" alt="image">
                            </td>
                            <td> Herman Beck </td>
                            <td style="text-align: center"> 55 </td>
                            <td> $ 77.99 </td>
                            <td> May 15, 2015 </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- kết thúc bảng nhân viên --}}

    {{-- Bắt đầu bảng khóa học --}}
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Top 10 khóa học bán chạy nhất</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> Tên khóa </th>
              <th> Giảng viên </th>
              <th> Số lượng </th>
              <th> Giá </th>
              <th> Cập nhập lần cuối </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> Khóa học làm web cho người mới bắt đầu </td>
              <td> Herman Beck </td>
              <td> 44 bài </td>
              <td> $ 77.99 </td>
              <td> May 15, 2015 </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
    {{-- Kết thúc bảng khóa học --}}

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{ asset('js/admin/chart_demo.js') }}"></script>
@stop
