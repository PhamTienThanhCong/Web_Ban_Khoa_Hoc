@extends('template.seller')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Quản lý khóa học
@stop

@section('content')

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