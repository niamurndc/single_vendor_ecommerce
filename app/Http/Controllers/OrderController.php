<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $order = Order::where('type', 'Online')->get();
        return view('admin.order.index', ['orders' => $order]);
    }

    public function edit($id){
        $order = Order::find($id); 
        return view('admin.order.view', ['order' => $order]);
    }

    public function update(Request $request, $id){
        $order = Order::find($id); 
        $order->status = $request->status;
        $order->update();
        return redirect()->back()->with('message', 'Updated Successful');
    }


    public function delete($id){
        $order = Order::find($id);
        $order->delete();
        return redirect('/admin/orders')->with('message', 'Deleted Successful');
    }
}
