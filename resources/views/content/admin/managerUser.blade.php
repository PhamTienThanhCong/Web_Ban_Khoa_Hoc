@extends('template.admin')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Quản lý người dùng
@stop

@section('content')

    {{-- Bảng Nhân Viên --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách người dùng: {{ $data->total() }} người dùng đã đăng kí</h4>
            <br>
            <form class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="height: 100%">Tìm kiếm theo tên</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1" name='search' value="{{ $search }}">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-gradient-primary" style="height: 100%" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Avatar </th>
                        <th> Tên </th>
                        <th> Email </th>
                        <th> Đã mua </th>
                        <th> Ngày ra nhập </th>
                        <th> Xem </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <td class="py-1">
                                {{-- <img src="{{ asset('img/profile.jpg') }}" alt="image"> --}}
                                <img src="{{ asset("images/avatar/".$user->image) }}" style="object-fit: cover;object-position: center;" alt="image">
                            </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> 
                                {{ $user->number_order }} khóa
                            </td>
                            <td> {{ date('d-m-Y', strtotime($user->created_at)) }} </td>
                            <td>
                                <a>
                                    Xem
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $data->links() }}
        </div>
    </div>
    {{-- Kết thúc bảng nhân viên --}}
@stop

@section('js')
@stop