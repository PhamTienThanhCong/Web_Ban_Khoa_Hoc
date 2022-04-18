@extends('template.seller')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Quản lý khóa học
@stop

@section('content')
    Tổng quan code 
    <br>
    <a href="{{ route('seller.detailCourse', 12) }}">Xem Khóa học bất kì</a>
@stop

@section('js')
    {{-- js code --}}
@stop