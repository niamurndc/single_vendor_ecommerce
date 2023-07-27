<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string'
        ]);

        $category = new category();

        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($request->title);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'cat-'.time().'.'.$ext;
        $category->image = $cover;
        $path = 'uploads/category';
        $image->move($path, $cover);

        $category->save();
        return redirect('/admin/categories')->with('message', 'Added Successful');
    }

    public function edit($id){
        $category = category::find($id);
        $categories = Category::all();
        return view('admin.category.edit', ['category' => $category, 'categories' => $categories]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string'
        ]);
        
        $category = category::find($id);

        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($request->title);

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'cat-'.time().'.'.$ext;
            $category->image = $cover;
            $path = 'uploads/category';
            $image->move($path, $cover);
        }

        $category->update();
        return redirect('/admin/categories')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $category = category::find($id);
        $products = Product::where('category_id', $id)->get();
        foreach($products as $product){
            $product->category_id = 0;
            $product->update();
        }
        $category->delete();
        return redirect('/admin/categories')->with('message', 'Deleted Successful');
    }
}
