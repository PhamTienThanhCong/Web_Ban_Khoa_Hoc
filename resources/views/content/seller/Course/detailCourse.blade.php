@extends('template.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/create_course.css') }}">
@stop

@section('title')
    Quản lý khóa học
@stop

@section('content')

    @if ($data->type == '2')
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
    @endif

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
                            src="{{ asset("images/".$data->image) }}"
                            alt="" />
                    </div>
                    <div class="cart-details">
                        <h3><u>Tên khóa học</u>: {{ $data->name }} </h3>
                        <p>
                            <i class="mdi mdi-book-open-page-variant"></i>
                            Số lượng bài học: {{ count($lesson) }} Bài
                        </p>

                        <p>
                            <i class="mdi mdi-account"></i>
                            Tác giả: 
                            @if (Session::get('lever') == '1')
                                {{ Session::get('name') }}
                            @else
                                {{ $name_admin }}
                            @endif
                        </p>

                        <p>
                            <i class="mdi mdi-cash"></i>
                            Giá thành: {{ number_format($data->price, 0, '', ',') }} đ
                        </p>
                        @if ($data->type == '2')
                        <p>
                            <i class="mdi mdi-star"></i>
                            Đánh giá: {{ round($total_rate,2) }} 
                        </p>
                        @endif
                        @if (Session::get('lever') == '1')
                            <a href="{{ route('seller.createLesson', $course) }}" style="text-align: center;">
                                Tạo Bài học mới
                            </a>  
                        @else
                            @if ($data->type == '1')
                                <a href="{{ route('admin.acceptCourse', [$name_admin, $course, 2]) }}">
                                    <button type="button" class="btn btn-gradient-info btn-fw">Xác nhận</button>
                                </a>                 
                                <a href="{{ route('admin.acceptCourse', [$name_admin, $course, 0]) }}">
                                    <button type="button" class="btn btn-gradient-danger btn-fw">Từ Chối</button>
                                </a>
                            @elseif ($data->type == '2')
                            <h4 class="text-primary">
                                Khóa học đã được xác nhận
                            </h4>
                            @elseif ($data->type == '0')
                            <h4 class="text-danger">
                                Khóa học đã bị từ chối
                            </h4>
                            @endif
                        @endif
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
                            <th> Xem Bài học </th>
                            @if (Session::get('lever') == '1')
                                <th> Thêm câu hỏi </th>                    
                            @endif
                            <th> Thời gian Tạo </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lesson as $index=>$ls)
                            <tr>
                                <td> {{ $index+1 }} </td>
                                <td> {{ $ls->name }} </td>
                                <td> {{ $ls->number }} </td>
                                <th>
                                    @if (Session::get('lever') == '1')
                                        <a href="{{ route('seller.questionManagement', [$course, $ls->id]) }}">
                                            Xem
                                        </a>
                                    @else
                                        <a href="{{ route('admin.viewLesson', [$name_admin, $course, $ls->id]) }}">
                                            Xem
                                        </a>
                                    @endif
                                </th>
                                @if (Session::get('lever') == '1')
                                    <th>    
                                        <a href="{{ route('seller.addQuestion', [$course, $ls->id]) }}">
                                            Thêm mới
                                        </a>
                                    </th>
                                @endif
                                <td>
                                    {{ date('d-m-Y', strtotime($ls->created_at)) }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <br>
                @if (Session::get('lever') == '1') 
                    <div style="width:100%; text-align: center;">
                        <a href="{{ route('seller.createLesson', $course) }}" style="text-align: center;">
                            Tạo Bài học mới
                        </a>                   
                    </div>
                @endif
                
                @if ($data->type == '2')
                    <br>
                    <h4 class="card-title">
                        <b> # Bình luận đánh giá</b>
                    </h4>
                    <br>
                    @foreach ($rates as $rate)
                        <div class="comment">
                            <p style="font-size: 14px; display: block; margin:0">
                                Ngày: {{ date('d-m-Y', strtotime($rate->created_at)) }}
                            </p>
                            <div class="comment-info">
                                <div class="comment-avatar">
                                    <img src="http://web_khoa_hoc.com/images/avatar/avatar.jpg" alt="">
                                </div>
                                <div class="comment-name">
                                    <p>
                                        {{ $rate->name }}
                                    </p>
                                    @for ($i = 0; $i < $rate->rate; $i++)
                                        <i class="mdi mdi-star" style="color: rgb(230, 29, 29); font-size: 19px; margin-right: -3px"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="conten-comment">
                                {{ $rate->comment }}
                            </div>
                        </div>
                    @endforeach
                @endif
                
                {{-- List môn học --}}
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
