<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $products = Product::all();
        return view('admin.inventory.index', ['products' => $products]);
    }

    public function filter(Request $request){
        $products = Product::where('title', 'LIKE', '%'.$request->search.'%')->get();
        return view('admin.inventory.index', ['products' => $products]);
    }

    public function categoryindex(){
        $products = Product::all();
        $cats = Category::all();
        return view('admin.inventory.category', ['products' => $products, 'cats' => $cats]);
    }

    public function categoryfilter(Request $request){
        $products = Product::where('category_id', $request->search)->get();
        $cats = Category::all();
        return view('admin.inventory.category', ['products' => $products, 'cats' => $cats]);
    }

    public function brandindex(){
        $products = Product::all();
        $brands = Brand::all();
        return view('admin.inventory.brand', ['products' => $products, 'brands' => $brands]);
    }

    public function brandfilter(Request $request){
        $products = Product::where('brand_id', $request->search)->get();
        $brands = Brand::all();
        return view('admin.inventory.brand', ['products' => $products, 'brands' => $brands]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'qty' => 'required|numeric',
        ]);
        
        $product = product::find($id);

        $product->qty = $request->qty;

        $product->update();
        return redirect('/admin/inventories')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $product = product::find($id);
        $product->delete();
        return redirect('/admin/inventories')->with('message', 'Deleted Successful');
    }
}
