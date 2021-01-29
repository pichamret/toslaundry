<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\orders;
use App\order_details;
use App\clients;
use App\Items;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(!empty($request->search))
      {
        $search = $request->input('search');
        $orders = DB::table('orders')->select()
                ->where('code', 'like', '%'.$search.'%')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
                // dd($orders); 
      }
      else if(!empty($request->datefrom))
      {
        $datefrom = $request->input('datefrom');
        $todate = $request->input('todate');
        $orders = DB::table('orders')->select()
        // ->whereBetween('ord_date', array($datefrom,$todate))
        // ->whereBetween('ord_date', array($request->from_date, $request->to_date))
                ->where('ord_date', '>=', $datefrom)
                ->where('ord_date', '<=', $todate)
                ->get();
                // dd($orders);   
      }else{
        // $orders = orders::orderBy('created_at', 'desc')->paginate(15);
        $order = orders::orderBy('create_at', 'desc');
      }
       
       // dd($orders);  //$countorders = orders::count('id');
      return view('backend.order.index',compact('orders'));
    }
    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Orders::all();
        $clients = Clients::all();
        $items = Items::all();
        return view('backend.order.create')->with(compact('orders','clients','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // $this->validate($request,[
        //   'ord_date'=>'required',
        //   'weight'=>'required',
        //   'price'=>'required',
        //   'paid'=>'required',
        //   'status'=>'required',
        //   'client_id'=>'required'
        // ]);

        // $order = new Orders();
        // $order->code = $request->input('code');
        // if ($order->code == null){
        //   // $order->code = Auth()->id();
        //   $latestOrder = Orders::orderBy('created_at','DESC')->first();
        //   $order->code = 'INV-'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
        // }
        // $date = date('Y-m-d H:i:s', strtotime($request->input('ord_date')));
        // $order->ord_date = $date;
        // $order->weight = $request->input('weight');
        // $order->discount = $request->input('discount');
        // $order->price = $request->input('price');
        // $order->total = $request->input('total');
        // $order->paid = $request->input('paid');
        // $order->status = $request->input('status');
        // $order->client_id = $request->input('client_id');
        // $order->save();

        // $order_id = $order->id;
        // dd($request->all());
        $order_id = 102;
        $items = $request->input('item_id');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $amount = $request->input('amount');
        // print_r($items);
        // exit;
        // dd(count($request->item_id));
        for($i=0; $i < count($items); $i++)
        {
          $order_details = new order_details();
            $order_details->fill([
              'order_id' => $order_id,
              'item_id' => $items[$i],
              'qty' => $qty[$i],
              'price' => $price[$i],
              'amount' => $amount[$i]
            ])->save();
        }
        return redirect(route('order'))->with('success','Created successfully!');
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
        // $invoiceitem = new order_details();
        //     $invoiceitem->qty = json_encode($request->qty);
        //     $invoiceitem->price = json_encode($request->price);
        //     $invoiceitem->amount = json_encode($request->amount);
        //     $invoiceitem->item_id = json_encode($request->item_id);
        //     $invoiceitem->order_id = json_encode($request->order_id);
            // $invoiceitem->qty = $request->input('qty');
            // $invoiceitem->price = $request->input('price');
            // $invoiceitem->amount = $request->input('amount');
            // $invoiceitem->item_id = $request->input('item_id');
            // $invoiceitem->order_id = $request->input('order_id');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $editorder = Orders::find($id);
      $clients = Clients::all();
      $items = Items::all();
      return view ('backend.order.edit')->with(compact('editorder','clients','items'));
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
        $this->validate($request,[
          'ord_date'=>'required',
          'weight'=>'required',
          'price'=>'required',
          'paid'=>'required',
          'status'=>'required',
          'client_id'=>'required'
        ]);

        $order = Orders::find($request->input('id'));
        $order->code = $request->input('code');
        if ($order->code == null){
          $order->code = Auth()->id();
          $latestOrder = Orders::orderBy('created_at','DESC')->first();
          $order->code = 'INV-'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
        }
        $date = date('Y-m-d H:i:s', strtotime($request->input('ord_date')));
        $order->ord_date = $date;
        $order->weight = $request->input('weight');
        $order->discount = $request->input('discount');
        $order->price = $request->input('price');
        $order->total = $request->input('total');
        $order->paid = $request->input('paid');
        $order->status = $request->input('status');
        $order->client_id = $request->input('client_id');
        $order->update();

        return redirect(route('order'))->with('success','Created successfully!');
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
        $invoice = orders::where('id',$id)->delete();
        return redirect()->back()->with('success','Deleted successfully!');
    }
}
