<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller
{
   public function add()
   {
     return view('admin.course.create');
   }

   public function create(Request $request)
   {
     $this->validate($request,Course::$rules);
     $course = new Course;
     $form = $request->all();

     unset($form['_token']);
     //データベースに保存する
     $course->fill($form);
     $course->save();

     return redirect('admin/course/create');
   }

   public function index(Request $request)
   {
     return view('admin.course.index');
   }

   public function delete(Request $request)
   {
     $course = Course::find($request->id);
     $course->delete();
     return redirect('admin/course/');
   }
}
