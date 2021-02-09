<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Course;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function add()
    {
        //コース一覧を入れておく変数
        $courses = Course::where('del_flg', false)->get();
        $error_message = '';
        return view('reservation.create', compact('courses', 'error_message'));
    }

    public function create(Request $request)
    {
        $form = $request->all();
        $this->validate($request, Reservation::rules($form['start_date'], $form['course_id']));
        //exists = true,falseを返す
        $reservation = new Reservation;
        $reservation->name = $form['name'];
        $reservation->sex = $form['sex'];
        $reservation->age = $form['age'];
        $reservation->phonenumber = $form['phonenumber'];
        $reservation->mail = $form['mail'];
        $reservation->start_date = new Carbon($form['start_date']);
        $reservation->course_id = $form['course_id'];
        $reservation->symptom = $form['symptom'];
        $reservation->end_date = Reservation::calcEndDate($form['start_date'], $form['course_id']);
        $reservation->save();
        return view('admin.reservation.receptionist');
    }

    public function confirm(Request $request)
    {
        $form = $request->all();
        $c = Course::where('del_flg', false)
                         ->where('id',$form['course_id'])
                         ->first();
        $date = new Carbon($form['start_date']);
        $this->validate($request, Reservation::rules($form['start_date'], $form['course_id']));
        return view('reservation.confirm', ['form' => $form,'c' => $c,'date' => $date]);
    }
}
