<?php

namespace App\Http\Controllers\Admin;

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
      $courses = Course::where('del_flg',false)->get();
      $error_message = '';
      return view('admin.reservation.create',compact('courses','error_message'));
    }

    public function create(Request $request)
    {
    $this->validate($request,Reservation::$rules);
    $courses = Course::where('del_flg',false)->get();
    $form = $request->all();
    $date =  new Carbon($form['start_date']);
    $required_time = new Carbon(['required_time']);
    $end_date = $date + $required_time;
    //$after_date = new Carbon($form['start_date']);
    //$before_date = new Carbon($form['start_date']);
    //$after_date = $after_date->addHour();
    //$before_date = $before_date->subHour();
    //　$date=17:00だったら
    // reservationテーブルから17:00~17:59までのレコードを取り出す
    $have_reservation = Reservation::where('start_date','<=',$date)
                                   ->where('end_date','>=',$date)
                                   ->exists();
    //exists = true,falseを返す
    if ($have_reservation) {
          $error_message = 'この時間はすでに予約が入っています';
          return view('admin.reservation.create',['date' => $date, 'error_message' => $error_message,'courses' => $courses,'required_time' =>$required_time,'end_date' => $end_date]);
    } else {
    $reservation = new Reservation;
    unset($form['_token']);
    $reservation->create($form);
    return view('admin.reservation.receptionist');
    }
  }


    public function receptionist(Request $request)
    {
      return view('admin.reservation.receptionist');
    }

    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if($cond_title != '') {
        $posts = Reservation::where('title' , $cond_title)->get();
      } else {
        $posts = Reservation::all();
      }
      return view('admin.reservation.index' ,
      ['posts' => $posts, 'cond_title'  => $cond_title]);
    }

    public function edit(Request $request)
    {
      $reservation = Reservation::find($request->id);
      if(empty($reservation)) {
        abort(404);
      }
      return view('admin.reservation.edit',['reservation_form' => $reservation]);
    }

    public function update(Request $request)
    {
      $this->validate($request, Reservation::rules);
      $reservation = Reservation::find($request->id);
      $reservation_form = $request->all();
      unset($reservation_form['_token']);

      $reservation->fill($reservation_form)->save();

      return redirect('admin/reservation/');
    }

    public function delete(Request $request)
    {
      $reservation = Reservation::find($request->id);
      $reservation->delete();
      return redirect('admin/reservation/');
    }

    public function show(Request $request, $id)
    {
      $r = Reservation::find($id);
      return view('admin.reservation.show',['r' => $r, 'id' => $id]);
    }

    public function update_status(Request $request,$id)
    {
      Reservation::find($id)->update(['status' => '予約確定']);
      return redirect('admin/reservation/');
    }

    public function remove(Request $request,$id)
    {
      Reservation::find($id)->delete();
      return redirect('admin/reservation/');
    }
    //find = 0,1
    //where =複数　foreachを使う時など

    public function schedule(Request $requeset)
    {
      $reservation = Reservation::where('status','予約確定')
                                ->where('start_date','>=',Carbon::today())
                                ->orderBy('start_date','asc')->get();
      return view('admin.reservation.schedule',['reservation' => $reservation]);
    }

    public function confirm(Request $request){
      $courses = Course::where('del_flg',false)->get();
      $form = $request->all();
      $date =  new Carbon($form['start_date']);
      $required_time = new Carbon(['required_time']);
      $end_date = $date + $required_time;
      //$after_date = new Carbon($form['start_date']);
      //$before_date = new Carbon($form['start_date']);
      //$after_date = $after_date->addHour();
      //$before_date = $before_date->subHour();
      //　$date=17:00だったら
      // reservationテーブルから17:00~17:59までのレコードを取り出す
      $have_reservation = Reservation::where('start_date','<=',$date)
                                     ->where('end_date','>=',$date)
                                     ->exists();
  //確認画面でエラー画面を出せるようにする
      //exists = true,falseを返す
      if ($have_reservation) {
            $error_message = 'この時間はすでに予約が入っています';
            return view('admin.reservation.create',['date' => $date, 'error_message' => $error_message,'courses' => $courses,'required_time' =>$required_time,'end_date' => $end_date]);
      } else {
      return view('admin.reservation.confirm',['form' => $form]);
       }
    }
}
