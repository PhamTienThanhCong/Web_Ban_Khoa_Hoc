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
                    <h3><u>Tên khóa học</u>: Khóa học demo về môn kĩ thuật phần mềm</h3>
                    <p>
                        <i class="mdi mdi-book-open-page-variant"></i>
                        Số lượng bài học: 10 Bài
                    </p>

                    <p>
                        <i class="mdi mdi-account"></i>
                        Tác giả: Bé Công
                    </p>

                    <p>
                        <i class="mdi mdi-cash"></i>
                        Giá thành: 000 VND
                    </p>
                </div>
            </div>
            <br />
            <h4 class="card-title">
                <b> # Mô tả khóa học</b>
            </h4>
            <div class="page-title">
                Môn kĩ thuật phần mền <br> sáng thứ 3
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
                        <th> Đã học </th>
                        <th> Tổng quan </th>
                        <th> Chỉnh sửa </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> Bài mở đầu </td>
                        <td> 5 </td>
                        <td> 124 </td>
                        <th>
                            <a href="{{ route('seller.questionManagement', [$course , 1]) }}">
                                Xem
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('seller.addQuestion', [$course , 3]) }}">
                                Thêm mới
                            </a>
                        </th>
                    </tr>

                </tbody>
            </table>
            {{-- List môn học --}}
            <div></div>
        </div>
    </div>
    </div>
    {{-- end nội dung --}}

@stop

@section('js')
    {{-- js code --}}
@stop
