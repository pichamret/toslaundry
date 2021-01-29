<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\items;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::all();
        return view ('backend.item.index')->with(compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('backend.item.create');
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
            'unit_price'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);        
        $item = new Items();

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/uploads/item/'), $imageName);
        $imageName = 'uploads/item/'.$imageName;

        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->unit_price = $request->input('unit_price');
        $item->image = $imageName;
        
        $item->save();
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
        //
        $edititem = Items::find($id);
        return view ('backend.item.edit')->with(compact('edititem'));
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
        //
            $this->validate($request, [
            'name'=>'required',
            'unit_price'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);  
        $item = Items::find($request->input('id'));
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->unit_price = $request->input('unit_price');
        
        // Upload file
        if ($request->hasFile('image')) 
        {
            $imageName = time().'.'.$request->image->getClientOriginalExtension(); //getClientOriginalName
            $request->image->move(public_path('/uploads/item/'), $imageName);
            $imageName = 'uploads/item/'.$imageName;
            $item->image  = $imageName;
        } 

        $item->update();
        return redirect(route('item'))->with('success','Updated successfully!');
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
        $items = Items::where('id',$id)->delete();
        // return redirect()->back();
        return back()->with('success','Delete successfully!');
    }
}
