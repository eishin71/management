<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resavation;

class ResavationController extends Controller
{
    public function add()
    {
      return view('admin.resavation.create');
    }

    public function create(Request $request)
    {
      $this->validate($request,Resavation::$rules);
      $resavation = new Resavation;
      $form = $request->all();
      unset($sorm['_token']);

      $resavation->fill($form);
      $resavation->save();

      return redirect('admin/resavation/create');
    }

    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if($cond_title != '') {
        $posts = Resavation::where('title' , $cond_title)->get();
      } else {
        $posts = Resavation::all();
      }
      return view('admin.resavation.index' ,
      ['posts' => $posts, '$cond_title'  => $cond_title]);
    }

    public function edit(Request $request)
    {
      $resavation = Resavation::find($request->id);
      if(empty($resavation)) {
        abort(404);
      }
      return view('admin.resavation.edit',['resavation_form' => $resavation]);
    }

    public function update(Request $request)
    {
      $this->validate($request, Resavation::rules);
      $resavation = Resavation::find($request->id);
      $resavation_form = $request->all();
      unset($resavation_form['_token']);

      $resavation->fill($resavation_form)->save();

      return redirect('admin/resavation/');
    }

    public function delete(Request $request)
    {
      $resavation = Resevation::find($request->id);
      $resavation->delete();
      return redirect('admin/resavation/');
    }
}
