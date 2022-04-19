@extends('template.seller')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/question_lesson.css') }}">
@stop

@section('title')
    Quản lý câu hỏi
@stop

@section('content')
    {{-- Tên trang --}}
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-border-color"></i>
            </span> Quản lý câu hỏi bài {{ $course }}
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Cem câu hỏi {{ $course }} <i
                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    {{-- Tên trang --}}

    <div class="card">
        <div class="card-body">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <h4 class="card-title">Tỷ lệ trả lời</h4>
            <canvas id="barChart" style="height: 392px; display: block; width: 784px;" width="784" height="392"
                class="chartjs-render-monitor"></canvas>
        </div>
    </div>

    <div class="card" style="margin-top: 30px">
        <div class="card-body">
            <h4 class="card-title">Các câu hỏi</h4>
            
            <div>
                <h5>Câu hỏi 1: Từ HTML là từ viết tắt của từ nào? </h5>
                <ul>
                    <li>Hyperlinks and Text Markup Language </li>
                    <li>Home Tool Markup Language </li>
                    <li><b>Hyper Text Markup Language</b></li>
                    <li>Tất cả đều sai </li>
                    <li>
                        <a href="">
                            Sửa 
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        <a href="" style="margin-left: 15px">
                            Xóa
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h5>Câu hỏi 2: Ai (tổ chức nào) tạo ra Web standards?  </h5>
                <ul>
                    <li>The World Wide Web Consortium </li>
                    <li><b>Microsoft</b></li>
                    <li>Netscape</li>
                    <li>Tất cả đều sai. </li>
                    <li>
                        <a href="">
                            Sửa 
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        <a href="" style="margin-left: 15px">
                            Xóa
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h5>Câu hỏi 3: JavaScript là ngôn ngữ xử lý ở: </h5>
                <ul>
                    <li> Client </li>
                    <li>Server </li>
                    <li><b>Server/client</b></li>
                    <li>Không có dạng nào</li>
                    <li>
                        <a href="">
                            Sửa 
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        <a href="" style="margin-left: 15px">
                            Xóa
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h5>Câu hỏi 4:  Javascript là ngôn ngữ thông dịch hay biên dịch  </h5>
                <ul>
                    <li> Thông dịch </li>
                    <li>Biên dịch </li>
                    <li><b>Cả hai dạng</b></li>
                    <li>Không có dạng nào ở trên </li>
                    <li>
                        <a href="">
                            Sửa 
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        <a href="" style="margin-left: 15px">
                            Xóa
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h5>Câu hỏi 5: Từ HTML là từ viết tắt của từ nào? </h5>
                <ul>
                    <li>Hyperlinks and Text Markup Language </li>
                    <li>Home Tool Markup Language </li>
                    <li><b>Hyper Text Markup Language</b></li>
                    <li>Tất cả đều sai </li>
                    <li>
                        <a href="">
                            Sửa 
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        <a href="" style="margin-left: 15px">
                            Xóa
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            new Chart(document.getElementById("barChart"), {
                type: 'bar',
                data: {
                    labels: ["Câu 1", "Câu 2", "Câu 3", "Câu 4", "Câu 5"
                    ],
                    //   23 lable
                    datasets: [{
                        data: [12,23,15,12,34
                        ],
                        label: "Số người trả lời đúng",
                        borderColor: "black",
                        backgroundColor: "rgba(75, 192, 192, 0.6)",
                        // fill: false
                    },
                    {
                        data: [12,3,4,12,34
                        ],
                        label: "Số người trả lời sai",
                        borderColor: "black",
                        backgroundColor: "rgba(255, 99, 132, 0.6)",
                        // fill: false
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
