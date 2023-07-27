<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $products = Product::all();
        return view('admin.product.index', ['products' => $products]);
    }

    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.add', ['brands' => $brands, 'categories' => $categories]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'required|image|max:1000',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'brand' => 'required|numeric',
            'category' => 'required|numeric',
        ]);

        $product = new product();

        $product->title = $request->title;
        $product->price = $request->price;
        $product->offprice = $request->offprice;
        $product->qty = $request->qty;
        $product->desc = $request->desc;
        $product->tags = $request->tags;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;
        $product->slug = Str::slug($request->title);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'pro-'.time().'.'.$ext;
        $product->image = $cover;
        $path = 'uploads/product';
        $image->move($path, $cover);

        $product->save();
        return redirect('/admin/products')->with('message', 'Added Successful');
    }

    public function edit($id){
        $product = product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'brand' => 'required|numeric',
            'category' => 'required|numeric',
        ]);
        
        $product = product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->offprice = $request->offprice;
        $product->qty = $request->qty;
        $product->desc = $request->desc;
        $product->tags = $request->tags;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;
        $product->slug = Str::slug($request->title);


        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'pro-'.time().'.'.$ext;
            $product->image = $cover;
            $path = 'uploads/product';
            $image->move($path, $cover);
        }

        $product->update();
        return redirect('/admin/products')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $product = product::find($id);
        $product->delete();
        return redirect('/admin/products')->with('message', 'Deleted Successful');
    }
}
