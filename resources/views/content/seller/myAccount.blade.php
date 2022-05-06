@extends('template.seller')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/my_account.css') }}">
@stop

@section('title')
    Tài khoản của tôi
@stop

@section('content')
    <div class="col-12 grid-margin stretch-card" id="change-my_account">
        <div class="card">
            <div class="card-body">
                @if(Session::has('error'))
                    <h4 class="text-danger">{{ Session::get('error') }}</h4>
                @endif
                @if(Session::has('success'))
                    <h4 class="text-success">{{ Session::get('success') }}</h4>
                @endif
                <p class="card-description"> Tài khoản của {{ Session::get('name') }} </p>
                <br>
                <div class="avatar-preview">
                    <img width="100%" height="100%" src="{{ asset("images/avatar/".Session::get('image')) }}" alt="">
                </div>
                <div class="name-preview">
                    <h3>
                        {{ Session::get('name') }}
                    </h3>
                </div>
                <div class="infor-preview">
                    <div class="email-preview">
                        <i class="mdi mdi-email-outline" style="font-size: 18px"></i>
                        Email: {{ $admin->email }}
                    </div>
                    <br>
                    <div class="description-preview">
                        - Mô tả bản thân: {{ $admin->description }}
                    </div>
                </div>
                <div class="result-account">
                    <div class="box-result"> 
                        <h1>
                            15
                        </h1>
                        <p>
                            khóa học
                        </p>
                    </div>
                    <div class="box-result"> 
                        <h1>
                            1889
                        </h1>
                        <p>
                            đã bán
                        </p>
                    </div>
                    <div class="box-result"> 
                        <h1>
                            4.3
                        </h1>
                        <p>
                            đánh giá
                        </p>
                    </div>
                </div>
                <div class="change-info-btn">
                    <button class="btn btn-outline-danger btn-fw" style="margin: auto;" onclick="showChange()">
                        Chỉnh sửa thông tin
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- style="display:none" --}}
    <div class="col-12 grid-margin stretch-card" id="change-my-account">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Quản lý tài khoản</h4>
                <p class="card-description"> Chỉnh sửa đi nhé cậu yêu :3 </p>
                <form class="forms-sample" method="post" action="{{ route('admin.myAccountUpdate') }} " enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{ $admin->name }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="{{ $admin->email }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện mới</label>
                        <div class="input-group col-xs-12">
                            <input type="file" name="image" class="form-control file-upload-info"
                                placeholder="Upload Image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả bản thân</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4" style="resize: vertical;" required> {{ $admin->description }} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password"
                            required>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Thay đổi</button>
                    <button class="btn btn-light" onclick="hinddenChange()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        function showChange(){
            document.getElementById("change-my-account").style.display="block";
        }
        function hinddenChange(){
            document.getElementById("change-my-account").style.display="none";
        }
    </script>
@stop
