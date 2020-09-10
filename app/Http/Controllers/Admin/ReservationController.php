<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Course;

class ReservationController extends Controller
{
    public function add()
    {
      //コース一覧を入れておく変数
      $courses = Course::all();
      return view('admin.reservation.create',compact('courses'));
    }

    public function create(Request $request)
    {
      $this->validate($request,Reservation::$rules);
      $reservation = new Reservation;
      $form = $request->all();
      unset($form['_token']);

      $reservation->fill($form);
      //症状がない場合、からのデータを送る
      if ($reservation->symptom == null){
        $reservation->symptom = '';
      }
      $reservation->save();

      return redirect('admin/reservation/create');
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
      $id = $request->id;
      $posts = Reservation::where('id', $id)->get();
      return view('admin.reservation.show',['posts' => $posts, 'id' => $id]);
    }
}
