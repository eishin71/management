@extends('layouts.admin')
@section('title','問診票編集画面')
@section('content')
<div class="container">
  <h2>問診票編集画面</h2>
  <form action="{{ action('Admin\MedicalHistoryController@update',
  ['client_id' => $treatment->client_id,'treatment_date' => $treatment->treatment_date->format('Ymd')]) }}" method="post">
    <div class="form-group row">
      <label class="col-md-2">来店日</label>
      <div class="col-md-10">
        <input type="date" class="form-control" name="treatment_date" value="{{ $treatment->treatment_date->format('Y-m-d') }}">
      </div>
    </div>
    @foreach ($questions as $q)
    <div class="form-group row">
      <label class="col-md-2" value="{{ $q->id }}">{{ $q->question }}</label>
      <div class="col-md-10">
        <select name="answer[{{ $q->id }}]" id="$answers->question_id">
          <option value=""></option>
          <option value="はい" {{ $answers == 'はい' ? 'selected' : '' }}>はい</option>
          <option value="いいえ" {{ $answers == 'いいえ' ? 'selected' : '' }}>いいえ</option>
        </select>
      </div>
    </div>
    @endforeach
    <div class="form-group row">
      <label class="col-md-2">コース</label>
      <div class="col-md-10">
        <select　name="course_id">
          <option value="">コースを選択してください</option>
          @foreach ($courses as $c)
            <option value="{{ $c->id}}" >{{ $c->name }}</option>
          @endforeach
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-2">施術箇所</label>
        <div class="col-md-10">
          @if (in_array("頭",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="頭" checked="checked">頭
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="頭">頭
　　　　　  </label>
          @endif
          @if (in_array("首",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="首" checked="checked">首
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="首">首
　　　　　  </label>
          @endif
          @if (in_array("右肩",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右肩" checked="checked">右肩
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右肩">右肩
　　　　　  </label>
          @endif
          @if (in_array("左肩",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左肩" checked="checked">左肩
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左肩">左肩
　　　　　  </label>
          @endif
          @if (in_array("右肩甲骨",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右肩甲骨" checked="checked">右肩甲骨
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右肩甲骨">右肩甲骨
　　　　　  </label>
          @endif
          @if (in_array("左肩甲骨",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左肩甲骨" checked="checked">左肩甲骨
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左肩甲骨">左肩甲骨
　　　　　  </label>
          @endif
          @if (in_array("胸",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="胸" checked="checked">胸
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="胸">胸
　　　　　  </label>
          @endif
          @if (in_array("右上腕",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右上腕" checked="checked">右上腕
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右上腕">右上腕
　　　　　  </label>
          @endif
          @if (in_array("左上腕",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左上腕" checked="checked">左上腕
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左上腕">左上腕
　　　　　  </label>
          @endif
          @if (in_array("右前腕",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右前腕" checked="checked">右前腕
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右前腕">右前腕
　　　　　  </label>
          @endif
          @if (in_array("左前腕",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左前腕" checked="checked">左前腕
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左前腕">左前腕
　　　　　  </label>
          @endif
          @if (in_array("右手首",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右手首" checked="checked">右手首
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右手首">右手首
　　　　　  </label>
          @endif
          @if (in_array("左手首",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左手首" checked="checked">左手首
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左手首">左手首
　　　　　  </label>
          @endif
          @if (in_array("右手",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右手" checked="checked">右手
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右手">右手
　　　　　  </label>
          @endif
          @if (in_array("左手",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左手" checked="checked">左手
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左手">左手
　　　　　  </label>
          @endif
          @if (in_array("腰",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="腰" checked="checked">腰
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="腰">腰
　　　　　  </label>
          @endif
          @if (in_array("背中",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="背中" checked="checked">背中
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="背中">背中
　　　　　  </label>
          @endif
          @if (in_array("股関節",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="股関節" checked="checked">股関節
　　　　　  </label>
　　　　　　@else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="股関節">股関節
　　　　　  </label>
          @endif
          @if (in_array("腹",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="腹" checked="checked">腹
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="腹">腹
　　　　　  </label>
          @endif
          @if (in_array("尻",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="尻" checked="checked">尻
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="尻">尻
　　　　　  </label>
          @endif
          @if (in_array("右太もも",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右太もも" checked="checked">右太もも
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右太もも">右太もも
　　　　　  </label>
          @endif
          @if (in_array("左太もも",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左太もも" checked="checked">左太もも
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左太もも">左太もも
　　　　　  </label>
          @endif
          @if (in_array("右ふくらはぎ",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右ふくらはぎ" checked="checked">右ふくらはぎ
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右ふくらはぎ">右ふくらはぎ
　　　　　  </label>
          @endif
          @if (in_array("左ふくらはぎ",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左ふくらはぎ" checked="checked">左ふくらはぎ
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左ふくらはぎ">左ふくらはぎ
　　　　　  </label>
          @endif
          @if (in_array("右足首",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右足首" checked="checked">右足首
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右足首">右足首
　　　　　  </label>
          @endif
          @if (in_array("左足首",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左足首" checked="checked">左足首
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左足首">左足首
　　　　　  </label>
          @endif
          @if (in_array("右足",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右足" checked="checked">右足
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="右足">右足
　　　　　  </label>
          @endif
          @if (in_array("左足",$treatment->decode_part()))
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左足" checked="checked">左足
　　　　　  </label>
          @else
          <label>
　　　　　　　<input type="checkbox" name="part[]" value="左足">左足
　　　　　  </label>
          @endif
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
