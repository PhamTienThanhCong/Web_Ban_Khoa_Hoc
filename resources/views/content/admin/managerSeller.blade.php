@extends('template.admin')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Quản lý Nhân viên
@stop

@section('content')

    {{-- Bảng Nhân Viên --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách nhân viên: {{ $data->total() }} nhân viên</h4>
            <br>
            <form class="form-group">
                <select class="form-control" id="exampleFormControlSelect2" name="check" value="{{ $type }}">
                    <option value="2" @if ($type == "2")
                        selected="selected"
                    @endif >--Tất cả nhân viên--</option>
                    <option value="4" @if ($type == "4")
                        selected="selected"
                    @endif >--Đang chờ--</option>
                    <option value="1"  @if ($type == "1")
                        selected="selected"
                    @endif >--Đang tham gia--</option>
                    <option value="3"  @if ($type == "3")
                        selected="selected"
                    @endif >--Đang bị chặn--</option>
                </select>
                <br>
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
                        <th> Name </th>
                        <th> Trạng thái </th>
                        <th> Khóa học </th>
                        <th> Ngày ra nhập </th>
                        <th> Xem </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $admin)
                        <tr>
                            <td class="py-1">
                                {{-- <img src="{{ asset('img/profile.jpg') }}" alt="image"> --}}
                                <img src="{{ asset("images/avatar/".$admin->image) }}" style="object-fit: cover;object-position: center;" alt="image">
                            </td>
                            <td> {{ $admin->name }} </td>
                            <td>
                                @if ($admin->lever == 0)
                                    <label class="badge badge-warning">Đang chờ</label>
                                @elseif ($admin->lever == 1)
                                    <label class="badge badge-primary">Đang tham gia</label>
                                @elseif ($admin->lever == 3)
                                    <label class="badge badge-danger">Đang chặn</label>
                                @endif

                            </td>
                            <td> 
                                <a href="{{ route('admin.managerCourse', $admin->name) }}">
                                    {{ $admin->number - 1 }} khóa
                                </a>
                            </td>
                            <td> {{ date('d-m-Y', strtotime($admin->created_at)) }} </td>
                            <td>
                                <a href="{{ route('admin.viewSeller', $admin->id) }}">
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
