@extends('template.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/seller/question_lesson.css') }}">
@stop

@section('title')
    Quản lý bài học {{ $my_lesson->name }}
@stop

@section('content')
    {{-- start preview bài học --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bài học: {{$my_lesson->name}}</h4>
            <iframe width="100%" height="450" src="{{ $my_lesson->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p>
                Mô tả: <br>
                {{ $my_lesson->description }} 
            </p>
        </div>
    </div>
    {{-- end preview bài học --}}

    @if (count($results_question))
        <div class="card" style="margin-top: 30px">
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
                <p> Số lượng câu hỏi: {{ count($number_true) }} 
                    @if (Session::get('lever') == '1')
                        <br>
                        <a href="{{ route('seller.addQuestion', [$my_course->id, $my_lesson->id ]) }}">
                            Thêm câu hỏi ngay
                        </a>
                    @endif
                    
                </p>
                    <div>
                        <?php $titleQuestion =  $results_question->first() ?>
                        <?php $index = 0 ?>
                    
                        <h5>
                            <b>Câu hỏi {{++$index}}: </b>
                            {{ $titleQuestion->question }}
                            (@if ($titleQuestion->type == 1)
                                Nhiều câu trả lời đúng
                            @elseif ($titleQuestion->type == 2)
                                Chỉ một câu trả lời đúng
                            @elseif ($titleQuestion->type == 3)
                                Câu trả lời bằng văn bản
                            @endif)
                        </h5>
                        <ul style="list-style-type: none">
                        
                        @foreach ($results_question as $results)
                            @if ($titleQuestion->id != $results->id)
                                @if (Session::get('lever') == '1')
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
                                @endif
                                </ul>
                                <h5>
                                    <b>Câu hỏi {{++$index}}: </b> 
                                    {{ $results->question }}
                                    (@if ($results->type == 1)
                                        Nhiều câu trả lời đúng
                                    @elseif ($results->type == 2)
                                        Chỉ một câu trả lời đúng
                                    @elseif ($results->type == 3)
                                        Câu trả lời bằng văn bản
                                    @endif)
                                </h5>
                                <?php $titleQuestion = $results ?>
                                <ul style="list-style-type: none">
                            @endif
                            @if ($results->check == 1)
                                <li>
                                    @if ($results->type == 1)
                                        <input type="checkbox" checked="checked" onclick="return false;">
                                    @elseif ($results->type == 2)
                                        <input type="radio" checked="checked" onclick="return false;">
                                    @endif
                                    {{ $results->answer }}
                                </li>
                            @else
                                <li> 
                                    @if ($results->type == 1)
                                        <input type="checkbox" onclick="return false;">
                                    @elseif ($results->type == 2)
                                        <input type="radio" onclick="return false;">
                                    @endif
                                    {{ $results->answer }} 
                                </li>
                            @endif
                        @endforeach
                        @if (Session::get('lever') == '1')
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
                        @endif
                        </ul>
                    </div>
            </div>
        </div>
    @else
        <div class="card" style="margin-top: 30px">
            <div class="card-body" style="text-align: center">
                <h4 class="card-title" style="text-align: center">Bài học chưa có câu hỏi nào</h4>
                @if (Session::get('lever') == '1')
                    <a href="{{ route('seller.addQuestion', [$my_course->id, $my_lesson->id ]) }}">
                        Tạo câu hỏi ngay
                    </a>
                @endif
            </div>
        </div>
    @endif
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            new Chart(document.getElementById("barChart"), {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($number_true as $index=>$results)
                            "Câu {{  $index+1 }}",
                        @endforeach
                    ],
                    //   23 lable
                    datasets: [{
                        data: [
                            @foreach ($number_true as $results)
                                {{ $results."," }}
                            @endforeach
                        0,],
                        label: "Số người trả lời đúng",
                        borderColor: "black",
                        backgroundColor: "rgba(75, 192, 192, 0.6)",
                        // fill: false
                    },
                    {
                        data: [
                            @foreach ($number_false as $results)
                                {{ $results."," }}
                            @endforeach
                        0,],
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
