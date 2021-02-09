<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientController extends Controller
{
    public function add()
    {
        //$question = Question::where('del_flg',false)->get();
        return view('admin.client.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Client::$rules);
        $client = new Client;
        $form = $request->all();
        unset($form['_token']);

        $client->fill($form);
        $client->save();

        return redirect()->action('Admin\ClientController@details', ['id' => $client->id]);
    }

    public function index(Request $request)
    {
        $posts = Client::all();
        return view('admin.client.index', ['posts' => $posts]);
    }

    public function show(Request $request, $id)
    {
        $client = Client::find($id);
        return view('admin.client.show', ['client' => $client, 'id' => $id]);
    }

    public function edit(Request $request, $id)
    {
        $client = Client::find($id);
        if (empty($client)) {
            abort(404);
        }
        return view('admin.client.edit', ['client' => $client, 'id' => $id]);
    }

    public function details(Request $request, $id)
    {
        $client = Client::find($id);
        return view('admin.client.details', ['client' => $client, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Client::$rules);
        $client = Client::find($request->id);
        $client_form = $request->all();
        unset($client_form['_token']);

        $client->fill($client_form)->save();

        return view('admin.client.show', ['client' => $client, 'id' => $id]);
    }

    public function remove(Request $request,$id)
    {
        $client = Client::find($id)->delete();

        return redirect()->action('Admin\ClientController@index');

    }
}
