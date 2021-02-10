@extends('layouts.admin')
@section('title','問診票')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\StartController@index') }}">HOME</a>
        </div>
    </div>
    <h2>問診票</h2>
    <div class="form-group row">
        <div class="col-md-5 md-auto">
            <h3>{{ $answer_date->format('Y年m月d日') }}</h3>
            @foreach($answers as $answer)
            <div class="row">
                <lavel class="col-md-6">
                    {{ $answer->question->question }}
                </lavel>
                <div class="col-md-6">
                    {{ $answer->answer }}
                </div>
            </div>
            @endforeach
            <div class="form-group row">
                <label class="col-md-6">コース</label>
                <div class="col-md-6">
                    <p>{{ $treatment->course->name }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-6">施術箇所</label>
                <div class="col-md-6">
                    @foreach ($treatment->decode_part() as $part)
                    <p>{{ $part }}</p>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-6">施術内容</label>
                <div class="col-md-6">
                    <p>{{ $treatment->treatment }}</p>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="human_figure_block">
                        <img class="human_figure" alt="施術箇所" src="{{ asset('/img/human_figure.jpg') }}">
                        @if (in_array("頭",$treatment->decode_part()))
                        <div class="human_figure_part Head"></div>
                        <div class="human_figure_part Head_2"></div>
                        @endif
                        @if (in_array("首",$treatment->decode_part()))
                        <div class="human_figure_part Neck"></div>
                        <div class="human_figure_part Neck_2"></div>
                        @endif
                        @if (in_array("右肩",$treatment->decode_part()))
                        <div class="human_figure_part Rightshoulder"></div>
                        <div class="human_figure_part Rightshoulder_2"></div>
                        @endif
                        @if (in_array("左肩",$treatment->decode_part()))
                        <div class="human_figure_part Leftshoulder"></div>
                        <div class="human_figure_part Leftshoulder_2"></div>
                        @endif
                        @if (in_array("右肩甲骨",$treatment->decode_part()))
                        <div class="human_figure_part Rightscapula"></div>
                        @endif
                        @if (in_array("左肩甲骨",$treatment->decode_part()))
                        <div class="human_figure_part Leftscapula"></div>
                        @endif
                        @if (in_array("胸",$treatment->decode_part()))
                        <div class="human_figure_part Breast"></div>
                        @endif
                        @if (in_array("右上腕",$treatment->decode_part()))
                        <div class="human_figure_part Rightupperarm"></div>
                        <div class="human_figure_part Rightupperarm_2"></div>
                        @endif
                        @if (in_array("左上腕",$treatment->decode_part()))
                        <div class="human_figure_part Leftupperarm"></div>
                        <div class="human_figure_part Leftupperarm_2"></div>
                        @endif
                        @if (in_array("右前腕",$treatment->decode_part()))
                        <div class="human_figure_part Rightforearm"></div>
                        <div class="human_figure_part Rightforearm_2"></div>
                        @endif
                        @if (in_array("左前腕",$treatment->decode_part()))
                        <div class="human_figure_part Leftforearm"></div>
                        <div class="human_figure_part Leftforearm_2"></div>
                        @endif
                        @if (in_array("右手首",$treatment->decode_part()))
                        <div class="human_figure_part Rightwrist"></div>
                        <div class="human_figure_part Rightwrist_2"></div>
                        @endif
                        @if (in_array("左手首",$treatment->decode_part()))
                        <div class="human_figure_part Leftwrist"></div>
                        <div class="human_figure_part Leftwrist_2"></div>
                        @endif
                        @if (in_array("右手",$treatment->decode_part()))
                        <div class="human_figure_part Righthand"></div>
                        <div class="human_figure_part Righthand_2"></div>
                        @endif
                        @if (in_array("左手",$treatment->decode_part()))
                        <div class="human_figure_part Lefthand"></div>
                        <div class="human_figure_part Lefthand_2"></div>
                        @endif
                        @if (in_array("腰",$treatment->decode_part()))
                        <div class="human_figure_part Waist"></div>
                        @endif
                        @if (in_array("背中",$treatment->decode_part()))
                        <div class="human_figure_part back"></div>
                        @endif
                        @if (in_array("股関節",$treatment->decode_part()))
                        <div class="human_figure_part Hip"></div>
                        @endif
                        @if (in_array("腹",$treatment->decode_part()))
                        <div class="human_figure_part Belly"></div>
                        @endif
                        @if (in_array("尻",$treatment->decode_part()))
                        <div class="human_figure_part Butt"></div>
                        @endif
                        @if (in_array("右太もも",$treatment->decode_part()))
                        <div class="human_figure_part Rightthighs"></div>
                        <div class="human_figure_part Rightthighs_2"></div>
                        @endif
                        @if (in_array("左太もも",$treatment->decode_part()))
                        <div class="human_figure_part Leftthighs"></div>
                        <div class="human_figure_part Leftthighs_2"></div>
                        @endif
                        @if (in_array("右ふくらはぎ",$treatment->decode_part()))
                        <div class="human_figure_part Rightcalf"></div>
                        <div class="human_figure_part Rightcalf_2"></div>
                        @endif
                        @if (in_array("左ふくらはぎ",$treatment->decode_part()))
                        <div class="human_figure_part Leftcalf"></div>
                        <div class="human_figure_part Leftcalf_2"></div>
                        @endif
                        @if (in_array("右足首",$treatment->decode_part()))
                        <div class="human_figure_part Rightankle"></div>
                        <div class="human_figure_part Rightankle_2"></div>
                        @endif
                        @if (in_array("左足首",$treatment->decode_part()))
                        <div class="human_figure_part Leftankle"></div>
                        <div class="human_figure_part Leftankle_2"></div>
                        @endif
                        @if (in_array("右足",$treatment->decode_part()))
                        <div class="human_figure_part Rigthleg"></div>
                        <div class="human_figure_part Rigthleg_2"></div>
                        @endif
                        @if (in_array("左足",$treatment->decode_part()))
                        <div class="human_figure_part Leftleg"></div>
                        <div class="human_figure_part Leftleg_2"></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <a href="{{ action('Admin\MedicalHistoryController@edit',
                    ['client_id' => $treatment->client_id,'treatment_date' => $answer_date->format('Ymd')]) }}">編集</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <form action="{{ action('Admin\MedicalHistoryController@remove',['client_id' => $client_id,'answer_date' => $answer_date->format('Ymd')]) }}" method="post">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger" value="削除">
            </form>
        </div>
    </div>
</div>
@endsection
