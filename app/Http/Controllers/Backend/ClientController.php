<?php

namespace App\Http\Controllers\Backend;

use App\clients;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Clients::all();
        return view ('backend.client.index')->with(compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.client.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        //
        $this->validate($request, [
            'name'=>'required',
            'phone'=>'required',
        ]);        
        $client = new Clients();

        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->note = $request->input('note');
        
        $client->save();
        return redirect()->back()->with('success','Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editclient = Clients::find($id);
        return view ('backend.client.edit')->with(compact('editclient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'phone'=>'required',
        ]);
        $client = Clients::find($request->input('id'));
        $client->name  = $request->input('name');
        $client->phone = $request->input('phone');
        $client->note = $request->input('note');

        $client->update();
        return redirect(route('client'))->with('success','Updated successfully!');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $clients = Clients::where('id',$id)->delete();
        return back()->with('success','Delete successfully!');
    }
}
