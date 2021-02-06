@extends('layouts.admin')
@section('title','問診票編集画面')

@section('content')
<div class="container">
    <h2>問診票編集画面</h2>
    <form action="{{ action('Admin\MedicalHistoryController@update',
    ['client_id' => $client_id,'answer_date' => $answer_date->format('Ymd')]) }}" method="post">
    <div class="form-group row">
        <input type="hidden" name="client_id" value="{{ $client_id }}">
    </div>
    <div class="form-group row">
        <label class="col-md-2">来店日</label>
        <div class="col-md-10">
            <input type="date" class="form-control" name="answer_date" value="{{ $answer_date->format('Y-m-d') }}">
        </div>
    </div>
    @foreach ($questions as $q)
    <?php $answer = $answers->where('question_id', $q->id)->first(); ?>
    <div class="form-group row">
        <label class="col-md-2" value="{{ $q->id }}">{{ $q->question }}</label>
        <div class="col-md-10">
            <select name="answer[{{ $q->id }}]">
                <option value=""></option>
                <option value="はい" {{ $answer->answer == 'はい' ? 'selected' : '' }}>はい</option>
                <option value="いいえ" {{ $answer->answer == 'いいえ' ? 'selected' : '' }}>いいえ</option>
            </select>
        </div>
    </div>
    @endforeach
    <div class="form-group row">
        <label class="col-md-2">コース</label>
        <div class="col-md-10">
            <select name="course_id">
                <option value="">コースを選択してください</option>
                @foreach ($courses as $c)
                <option value="{{ $c->id}}"{{ $treatment->course_id == $c->id ? 'selected' : '' }} >{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">施術箇所</label>
        <div class="col-md-10">
            <label>
                <input type="checkbox" name="part[]" value="頭"
                @if (in_array("頭",$treatment->decode_part()))
                checked = "checked"
                @endif
                >頭
            </label>
            <label>
                <input type="checkbox" name="part[]" value="首"
                @if (in_array("首",$treatment->decode_part()))
                checked = "checked"
                @endif
                >首
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右肩"
                @if (in_array("右肩",$treatment->decode_part()))
                checked="checked"
                @endif
                >右肩
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左肩"
                @if (in_array("左肩",$treatment->decode_part()))
                checked="checked"
                @endif
                >左肩
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右肩甲骨"
                @if (in_array("右肩甲骨",$treatment->decode_part()))
                checked="checked"
                @endif
                >右肩甲骨
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左肩甲骨"
                @if (in_array("左肩甲骨",$treatment->decode_part()))
                checked="checked"
                @endif
                >左肩甲骨
            </label>
            <label>
                <input type="checkbox" name="part[]" value="胸"
                @if (in_array("胸",$treatment->decode_part()))
                checked="checked"
                @endif
                >胸
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右上腕"
                @if (in_array("右上腕",$treatment->decode_part()))
                checked="checked"
                @endif
                >右上腕
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左上腕"
                @if (in_array("左上腕",$treatment->decode_part()))
                checked="checked"
                @endif
                >左上腕
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右前腕"
                @if (in_array("右前腕",$treatment->decode_part()))
                checked="checked"
                @endif
                >右前腕
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左前腕"
                @if (in_array("左前腕",$treatment->decode_part()))
                checked="checked"
                @endif
                >左前腕
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右手首"
                @if (in_array("右手首",$treatment->decode_part()))
                checked="checked"
                @endif
                >右手首
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左手首"
                @if (in_array("左手首",$treatment->decode_part()))
                checked="checked"
                @endif
                >左手首
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右手"
                @if (in_array("右手",$treatment->decode_part()))
                checked="checked"
                @endif
                >右手
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左手"
                @if (in_array("左手",$treatment->decode_part()))
                checked="checked"
                @endif
                >左手
            </label>
            <label>
                <input type="checkbox" name="part[]" value="腰"
                @if (in_array("腰",$treatment->decode_part()))
                checked="checked"
                @endif
                >腰
            </label>
            <label>
                <input type="checkbox" name="part[]" value="背中"
                @if (in_array("背中",$treatment->decode_part()))
                checked="checked"
                @endif
                >背中
            </label>
            <label>
                <input type="checkbox" name="part[]" value="股関節"
                @if (in_array("股関節",$treatment->decode_part()))
                checked="checked"
                @endif
                >股関節
            </label>
            <label>
                <input type="checkbox" name="part[]" value="腹"
                @if (in_array("腹",$treatment->decode_part()))
                checked="checked"
                @endif
                >腹
            </label>
            <label>
                <input type="checkbox" name="part[]" value="尻"
                @if (in_array("尻",$treatment->decode_part()))
                checked="checked"
                @endif
                >尻
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右太もも"
                @if (in_array("右太もも",$treatment->decode_part()))
                checked="checked"
                @endif
                >右太もも
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左太もも"
                @if (in_array("左太もも",$treatment->decode_part()))
                checked="checked"
                @endif
                >左太もも
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左太もも"
                @if (in_array("左太もも",$treatment->decode_part()))
                checked="checked"
                @endif
                >左太もも
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右ふくらはぎ"
                @if (in_array("右ふくらはぎ",$treatment->decode_part()))
                checked="checked"
                @endif
                >右ふくらはぎ
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左ふくらはぎ"
                @if (in_array("左ふくらはぎ",$treatment->decode_part()))
                checked="checked"
                @endif
                >左ふくらはぎ
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右足首"
                @if (in_array("右足首",$treatment->decode_part()))
                checked="checked"
                @endif
                >右足首
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左足首"
                @if (in_array("左足首",$treatment->decode_part()))
                checked="checked"
                @endif
                >左足首
            </label>
            <label>
                <input type="checkbox" name="part[]" value="右足"
                @if (in_array("右足",$treatment->decode_part()))
                checked="checked"
                @endif
                >右足
            </label>
            <label>
                <input type="checkbox" name="part[]" value="左足"
                @if (in_array("左足",$treatment->decode_part()))
                checked="checked"
                @endif
                >左足
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">治療内容</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="treatment" rows="20" value="{{ $treatment->treatment }}">
        </div>
    </div>
    {{ csrf_field() }}
    <input type="submit" class="btn btn-primary" value="更新">
    </form>
</div>
@endsection
