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
      return view('admin.reservation.create',compact('courses'));
    }

    public function create(Request $request)
  {
    $date = Reservation::find($request->date);
    if (Reservation::where('date', $date)->get()){
          $error_message = 'この時間はすでに予約が入っています';
          return view('admin.reservation.create',['date' => $date,'error_message' => $error_message]);
    } else {
    $this->validate($request,Reservation::$rules);
    $reservation = new Reservation;
    $form = $request->all();
    unset($form['_token']);
    $reservation->create($form);
    }
    return view('admin.reservation.receptionist');
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
                                ->where('date','>=',Carbon::today())
                                ->orderBy('date','asc')->get();
      return view('admin.reservation.schedule',['reservation' => $reservation]);
    }

    public function confirm(Request $request){
      $form = $request->all();
      return view('admin.reservation.confirm',['form' => $form]);
    }
}
