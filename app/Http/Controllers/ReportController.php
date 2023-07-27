<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function sell(){
        $sell = Order::all();
        return view('admin.report.sell', ['sells' => $sell]);
    }

    public function sellfilter(Request $request){
        $sell = Order::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        return view('admin.report.sell', ['sells' => $sell]);
    }

    public function dueSell(){
        $sell = Order::where('due', '>', 0)->get();
        return view('admin.report.due-sell', ['sells' => $sell]);
    }

    public function product(){
        $product = Product::all();
        return view('admin.report.product', ['products' => $product, 'carts' => null]);
    }

    public function productfilter(Request $request){
        $product = Product::all();
        $carts = OrderItem::where('product_id', $request->product_id)->where('order_id', '!=', 0)->get();
        return view('admin.report.product', ['products' => $product, 'carts' => $carts]);
    }

    public function purshace(){
        $purshace = Order::all();
        return view('admin.report.purshace', ['purshaces' => $purshace]);
    }

    public function purshacefilter(Request $request){
        $purshace = Order::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        return view('admin.report.purshace', ['purshaces' => $purshace]);
    }
}
