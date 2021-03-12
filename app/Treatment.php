<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Barryvdh\Debugbar\Facade as Debugbar;

class Treatment extends Model
{
    protected $guarded = array('id');

    protected $dates = [
        'treatment_date'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function decode_part()
    {
        Debugbar::info(json_decode($this->part));
        return json_decode($this->part);
    }

    public static $rules = array(
        'course' => '',
        'part' => '',
        'treatment' => '',
        'treatment_date' => '',
        'client_id' => '',
    );

    //インスタンスメソッド
    public function save_from_params($params){
        $this->course_id = $params['course_id'];
        //値をjson形式に配列を文字列に変換する
        $this->part = json_encode($params['part']);
        $this->treatment = $params['treatment'];
        $this->treatment_date = $params['answer_date'];
        $this->client_id = $params['client_id'];
        $this->save();
        //$thisはオブジェクト自身を指す

    }
}
