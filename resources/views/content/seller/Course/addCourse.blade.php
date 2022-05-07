@extends('template.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/create_course.css') }}">
    <script src="https://cdn.tiny.cloud/1/qft0y7nd2fkpbh6iu02sd4mi8drr27xu3vdx2zvpjl2tjbxj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@stop

@section('title')
    Thêm khóa học
@stop

@section('content')

    {{-- Nội dung --}}
    <div class="sale-box-all">
        <div class="sales-boxes">
            <div class="recent-sales box" style="width: 100%; display: block">
                <div class="page-title">Tạo khóa học mới</div>
                <form class="new-couse" method="post" action="{{ route('seller.addCourseProcessing') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="">Tên của khóa học</label>
                    <input name="name" type="text" placeholder="Nhập tên của khóa học" onchange="changeTitle(event)" required/>
                    <br />
                    <label for="">Giá của khóa học</label>
                    <input name="price" type="number" placeholder="Nhập giá của khóa học" onchange="ChangePrice(event)" required/>
                    <br />
                    <label for="">Ảnh mô tả</label>
                    <input name="image" style="border: none" type="file" onchange="loadFile(event)" required/>
                    <br />
                    <textarea id="myTextarea"></textarea>
                    <textarea name="description" id="description-preview" style="display: none"></textarea>
                    <button id="btn" type="submit">Tạo khóa học mới</button>
                </form>
            </div>
        </div>

        <div class="sales-boxes" style="margin-top: 25px">
            <div class="recent-sales box" style="width: 100%; display: block">
                <div class="page-title">Xem trước khóa học mới</div>
                <div class="content">
                    <div class="img-pre">
                        <img id="img-preview"
                            src="https://image.thanhnien.vn/w1024/Uploaded/2022/xdrkxrvekx/2021_10_12/picture1-3031.png"
                            alt="" />
                    </div>
                    <br />
                    <div class="cart-details">
                        <h2 id="title-course">Tên khóa học:</h2>
                        <p id="number-course">
                            <i class="mdi mdi-book-open-page-variant"></i>
                            Số lượng bài học: 10 Bài
                        </p>

                        <p id="author-course">
                            <i class="mdi mdi-account"></i>
                            Tác giả: Bé Công
                        </p>

                        <p id="price-course">
                            <i class="mdi mdi-cash"></i>
                            Giá thành: 000 VND
                        </p>
                    </div>
                </div>
                <br />
                <div class="page-title">Mô tả khóa học</div>
                <br />
                <div id="description-push"></div>
            </div>
        </div>
    </div>
    {{-- Nội Dung --}}
    @stop
    
@section('js')
    <script src="{{ asset('js/seller/create_course.js') }}"></script>
@stop
