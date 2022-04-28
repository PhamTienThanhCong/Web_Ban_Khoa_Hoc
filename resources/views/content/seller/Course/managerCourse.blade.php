@extends('template.seller')

@section('css')
    {{-- Css code --}}
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
            </span> Tổng quan khóa học
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Tất cả khóa học<i
                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    {{-- Tên trang --}}

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Khóa học của tôi</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> Tên khóa </th>
                        <th> Giá </th>
                        <th> Đã bán </th>
                        <th> Ngày tạo </th>
                        <th> Cập nhập lần cuối </th>
                        <th> Xem </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $course)
                        <tr>
                            <td> {{ $course->name }} </td>
                            <td> {{ $course->price }} </td>
                            <td> 14 </td>
                            <td>
                                {{ date('d-m-Y', strtotime($course->created_at)) }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($course->updated_at)) }}
                            </td>
                            <th>
                                <a href="{{ route('seller.detailCourse', $course->id) }}">Xem </a>
                            </th>
                        </tr> 
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    
@stop

@section('js')
    {{-- js code --}}
@stop