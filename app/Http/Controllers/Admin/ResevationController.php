<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resevation;

class ResevationController extends Controller
{
    public function add()
    {
      return view('admin.resevation.create');
    }

    public function create(Request $request)
    {
      $this->validate($request,Resevation::$rules);
      $resevation = new Resevation;
      $form = $request->all();
      unset($sorm['_token']);

      $resevation->fill($form);
      $resevation->save();

      return redirect('admin/resevation/create');
    }

    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if($cond_title != '') {
        $posts = Resevation::where('title' , $cond_title)->get();
      } else {
        $posts = Resevation::all();
      }
      return view('admin.resevation.index' ,
      ['posts' => $posts, 'cond_title'  => $cond_title]);
    }

    public function edit(Request $request)
    {
      $resevation = Resevation::find($request->id);
      if(empty($resevation)) {
        abort(404);
      }
      return view('admin.resevation.edit',['resevation_form' => $resevation]);
    }

    public function update(Request $request)
    {
      $this->validate($request, Resevation::rules);
      $resevation = Resevation::find($request->id);
      $resevation_form = $request->all();
      unset($resevation_form['_token']);

      $resevation->fill($resevation_form)->save();

      return redirect('admin/resevation/');
    }

    public function delete(Request $request)
    {
      $resevation = Resevation::find($request->id);
      $resevation->delete();
      return redirect('admin/resevation/');
    }
}
