<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index', ['brands' => $brands]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string'
        ]);

        $brand = new Brand();

        $brand->title = $request->title;
        $brand->slug = Str::slug($request->title);

        $brand->save();
        return redirect('/admin/brands')->with('message', 'Added Successful');
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string'
        ]);
        
        $brand = Brand::find($id);

        $brand->title = $request->title;
        $brand->slug = Str::slug($request->title);

        $brand->update();
        return redirect('/admin/brands')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $brand = Brand::find($id);
        $products = Product::where('brand_id', $id)->get();
        foreach($products as $product){
            $product->brand_id = 0;
            $product->update();
        }
        $brand->delete();
        return redirect('/admin/brands')->with('message', 'Deleted Successful');
    }
}
