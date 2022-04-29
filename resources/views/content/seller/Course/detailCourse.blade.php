@extends('template.seller')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/create_course.css') }}">
@stop

@section('title')
    Quản lý khóa học
@stop

@section('content')
    {{-- Tên trang --}}
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-border-color"></i>
            </span> Xem khóa học {{ $course }}
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Xem khóa học {{ $course }} <i
                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    {{-- Tên trang --}}

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
            <h4 class="card-title">Số khóa học đã bán ra</h4>
            <canvas id="line-chart-seller-course" style="height: 407px; display: block; width: 815px;" width="815"
                height="407" class="chartjs-render-monitor"></canvas>
        </div>
    </div>
    {{-- Kết thúc biểu đồ thu nhập --}}

    {{-- start nội dung --}}
    <div class="sale-box-all">
        <div class="sales-boxes" style="margin-top: 25px">
            <div class="recent-sales box" style="width: 100%; display: block">
                <a href="" class="btn-link btn-fw">
                    <div class="page-title">Xem dưới quyền người dùng <i class="mdi mdi-account-search"></i> </div>
                </a>
                <div class="page-title">Xem Tổng thể</div>
                <div class="content">
                    <div class="img-pre">
                        <img id="img-preview"
                            src="https://image.thanhnien.vn/w1024/Uploaded/2022/xdrkxrvekx/2021_10_12/picture1-3031.png"
                            alt="" />
                    </div>
                    <br />
                    <div class="cart-details">
                        <h3><u>Tên khóa học</u>: {{ $data->name }} </h3>
                        <p>
                            <i class="mdi mdi-book-open-page-variant"></i>
                            Số lượng bài học: 10 Bài
                        </p>

                        <p>
                            <i class="mdi mdi-account"></i>
                            Tác giả: {{ Session::get('name') }}
                        </p>

                        <p>
                            <i class="mdi mdi-cash"></i>
                            Giá thành: {{ $data->price }} VND
                        </p>
                        <a href="{{ route('seller.createLesson', $course) }}" style="text-align: center;">
                            Tạo Bài học mới
                        </a>
                    </div>
                </div>
                <br />
                <h4 class="card-title">
                    <b> # Mô tả khóa học</b>
                </h4>
                <div>
                    {!! $data->description !!}
                </div>
                <br />
                {{-- List môn học --}}
                <h3 style="text-align: center">Danh sách bài học</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Tên Bài học </th>
                            <th> Số Câu hỏi </th>
                            <th> Tổng quan </th>
                            <th> Chỉnh sửa </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lesson as $index=>$ls)
                            <tr>
                                <td> {{ $index+1 }} </td>
                                <td> {{ $ls->name }} </td>
                                <td> 0 </td>
                                <th>
                                    <a href="{{ route('seller.questionManagement', [$course, $ls->id]) }}">
                                        Xem
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('seller.addQuestion', [$course, $ls->id]) }}">
                                        Thêm mới
                                    </a>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- List môn học --}}
                <div>
                </div>
                <br>
                    {{-- <a href="{{ route('seller.createLesson', $course) }}" style="text-align: center;">
                        Tạo Bài học mới
                    </a> --}}
            </div>
        </div>
    </div>
    {{-- end nội dung --}}

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            new Chart(document.getElementById("line-chart-seller-course"), {
                type: 'line',
                data: {
                    labels: ['6/2020', '7/2020', '8/2020', '9/2020', '10/2020', '11/2020', '12/2020',
                        '1/2021', '2/2021', '3/2021', '4/2021', '5/2021', '6/2021', '7/2021', '8/2021',
                        '9/2021', '10/2021', '11/2021', '12/2021', '1/2022', '2/2022', '3/2022',
                        '4/2022'
                    ],
                    //   23 lable
                    datasets: [{
                        data: [1, 4, 13, 18, 20, 22, 15, 24, 25, 30, 21, 28, 30, 32, 35,
                            36, 39, 42, 58, 59, 100, 116, 112
                        ],
                        label: "Số khóa học bán ra",
                        borderColor: "#48634e",
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Tổng quan thu nhập'
                    }
                }
            });
        });
    </script>
@stop
