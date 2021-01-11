@extends('layouts.admin')
@section('title','問診票')
@section('content')
  <div class="container">
    <h2>問診票</h2>
    <div class="row">
      <div class="list-answer col-md-5 md-auto">
        <h3>{{ $answer_date->format('Y年m月d日') }}</h3>
          @foreach($answers as $answer)
          <div class="row">
            {{ $answer->question->question }}
            {{ $answer->answer }}
          </div>
          @endforeach
          <p></p>
          <div class="form-group row">
            <label class="col-md-4">コース</label>
            <div class="col-md-8">
              <p>{{ $treatment->course->name }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4">施術箇所</label>
            <div class="col-md-8">
              <p>{{ $treatment->part }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4">施術内容</label>
            <div class="col-md-8">
              <p>{{ $treatment->treatment }}</p>
       　   </div>
          </div>
          <div class="form-group row">
            <div class="human_figure_block">
              <img class="human_figure" alt="施術箇所" src="{{ asset('/img/human_figure.jpg') }}">
              　@if ($treatment->part == "頭")
              　<div class="human_figure_part Head"></div>
            　  <div class="human_figure_part Head_2"></div>
        　　    @elseif ($treatment->part == "首")
              	<div class="human_figure_part Neck"></div>
                <div class="human_figure_part Neck_2"></div>
                @elseif ($treatment->part == "右肩")
              	<div class="human_figure_part Rightshoulder"></div>
                <div class="human_figure_part Rightshoulder_2"></div>
                @elseif ($treatment->part == "左肩")
              	<div class="human_figure_part Leftshoulder"></div>
                <div class="human_figure_part Leftshoulder_2"></div>
                @elseif ($treatment->part == "右肩甲骨")
              	<div class="human_figure_part Rightscapula"></div>
                @elseif ($treatment->part == "左肩甲骨")
              	<div class="human_figure_part Leftscapula"></div>
                @elseif ($treatment->part == "胸")
              	<div class="human_figure_part Breast"></div>
                @elseif ($treatment->part == "右上腕")
                <div class="human_figure_part Rightupperarm"></div>
                <div class="human_figure_part Rightupperarm_2"></div>
                @elseif ($treatment->part == "左上腕")
                <div class="human_figure_part Leftupperarm"></div>
                <div class="human_figure_part Leftupperarm_2"></div>
                @elseif ($treatment->part == "右前腕")
              	<div class="human_figure_part Rightforearm"></div>
                <div class="human_figure_part Rightforearm_2"></div>
                @elseif ($treatment->part == "左前腕")
              	<div class="human_figure_part Leftforearm"></div>
                <div class="human_figure_part Leftforearm_2"></div>
                @elseif ($treatment->part == "右手首")
              	<div class="human_figure_part Rightwrist"></div>
                <div class="human_figure_part Rightwrist_2"></div>
                @elseif ($treatment->part == "左手首")
              	<div class="human_figure_part Leftwrist"></div>
                <div class="human_figure_part Leftwrist_2"></div>
                @elseif ($treatment->part == "右手")
              	<div class="human_figure_part Righthand"></div>
                <div class="human_figure_part Righthand_2"></div>
                @elseif ($treatment->part == "左手")
              	<div class="human_figure_part Lefthand"></div>
                <div class="human_figure_part Lefthand_2"></div>
                @elseif ($treatment->part == "腰")
                <div class="human_figure_part Waist"></div>
                @elseif ($treatment->part == "背中")
              	<div class="human_figure_part back"></div>
                @elseif ($treatment->part == "股関節")
                <div class="human_figure_part Hip"></div>
                @elseif ($treatment->part == "腹")
              	<div class="human_figure_part Belly"></div>
                @elseif ($treatment->part == "尻")
              	<div class="human_figure_part Butt"></div>
                @elseif ($treatment->part == "右太もも")
              	<div class="human_figure_part Rightthighs"></div>
                <div class="human_figure_part Rightthighs_2"></div>
                @elseif ($treatment->part == "左太もも")
              	<div class="human_figure_part Leftthighs"></div>
                <div class="human_figure_part Leftthighs_2"></div>
                @elseif ($treatment->part == "右ふくらはぎ")
              	<div class="human_figure_part Rightcalf"></div>
                <div class="human_figure_part Rightcalf_2"></div>
                @elseif ($treatment->part == "左ふくらはぎ")
              	<div class="human_figure_part Leftcalf"></div>
                <div class="human_figure_part Leftcalf_2"></div>
                @elseif ($treatment->part == "右足首")
              	<div class="human_figure_part Rightankle"></div>
                <div class="human_figure_part Rightankle_2"></div>
                @elseif ($treatment->part == "左足首")
              	<div class="human_figure_part Leftankle"></div>
                <div class="human_figure_part Leftankle_2"></div>
                @elseif ($treatment->part == "右足")
              	<div class="human_figure_part Rigthleg"></div>
                <div class="human_figure_part Rigthleg_2"></div>
                @elseif ($treatment->part == "左足")
                <div class="human_figure_part Leftleg"></div>
                <div class="human_figure_part Leftleg_2"></div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
