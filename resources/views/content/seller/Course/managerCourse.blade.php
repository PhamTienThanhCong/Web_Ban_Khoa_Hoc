@extends('template.admin')

@section('css')
    {{-- Css code --}}
@stop

@section('title')
    Quản lý khóa học
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form class="form-group">
                <select class="form-control" id="exampleFormControlSelect2" name="check" value="{{ $type }}">
                    <option value="3" @if ($type == "3")
                        selected="selected"
                    @endif >--Tất cả khóa học--</option>
                    <option value="1" @if ($type == "1")
                        selected="selected"
                    @endif >--Khóa học đang chờ--</option>
                    <option value="2"  @if ($type == "2")
                        selected="selected"
                    @endif >--Khóa học đã được duyệt--</option>
                    @if (Session::get('lever') == '2')
                    <option value="0"  @if ($type == "2")
                        selected="selected"
                    @endif >--Khóa học đã hủy--</option>
                    @endif
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
            @if (Session::get('lever') == '1')
                <h4 class="card-title">Khóa học của tôi: {{ $data->total() }} Khóa</h4>
            @else
                <h4 class="card-title">Tất cả khóa học: {{ $data->total() }} Khóa</h4>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> Tên khóa </th>
                        <th> Giá </th>
                        @if (Session::get('lever') == '2')
                            <th> Tác giả </th>
                        @endif
                        <th> Đã bán </th>
                        <th> Cập nhập lần cuối </th>
                        <th> Trạng thái </th>
                        <th> Xem </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $course)
                        <tr>
                            <td> {{ $course->name }} </td>
                            <td> {{ number_format($course->price, 0, '', ',') }} VND</td> 
                            @if (Session::get('lever') == '2')
                            <th>
                                <a href="{{ route('admin.managerCourse', $course->name_admin) }}">
                                    {{ $course->name_admin }} 
                                </a>
                            </th>
                            @endif                                                                                                             
                            <td>
                                {{ $course->number_buy }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($course->updated_at)) }}
                            </td>
                            <td>
                                @if ($course->type == 1)
                                    <label class="badge badge-warning">Đang chờ</label>
                                @elseif ($course->type == 2)
                                    <label class="badge badge-primary">Đã duyệt</label>
                                @elseif ($course->type == 0)
                                    <label class="badge badge-danger">Đã Hủy</label>
                                @endif
                            </td>
                            <th>
                                @if (Session::get('lever') == '1')
                                    <a href="{{ route('seller.detailCourse', $course->id) }}">Xem </a>
                                @else
                                    <a href="{{ route('admin.mamagerDetailCourses', [$course->name_admin, $course->id]) }}">Xem </a> 
                                @endif
                            </th>
                        </tr> 
                    @endforeach

                </tbody>
            </table>
            <br>
            {{ $data->links() }}
        </div>
    </div>
    
@stop

@section('js')
    {{-- js code --}}
@stop