<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
  public function add()
  {
    return view('admin.client.create');
  }

  public function create(Request $request)
  {
    $this->validate($request,Client::$rules);
    $client = new Client;
    $form = $request->all();
    unset($form['_token']);

    $client->fill($form);
    $client->save();

    return view('admin.client.create2');
  }

  public function create2(Request $request)
  {
    $this->validate($request,Client::$rules);
    $client = new Client;
    $form = $request->all();
    unset($form['_token']);

    $client->fill($form);
    $client->save();

    return redirect('admin/client/create');
  }

  public function index(Request $request)
  {
    $posts = Client::all();
    return view('admin.client.index',['posts' => $posts]);
  }
}
