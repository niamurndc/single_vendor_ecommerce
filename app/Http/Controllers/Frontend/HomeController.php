<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\Product;
use App\Models\Savelist;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function index(){
        $products = Product::all();
        $slider = Slider::all();
        $feature = Feature::find(1);
        $setting = Setting::find(1);
        return view('welcome', ['products' => $products, 'sliders' => $slider, 'feature' => $feature, 'setting' => $setting]);
    }

    public function shop(){
        $products = Product::all();
        return view('shop', ['products' => $products]);
    }

    public function details($id){
        $product = Product::find($id);
        $products = Product::all();
        return view('details', ['products' => $products, 'product' => $product ]);
    }

    public function category($id){
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        return view('category', ['products' => $products, 'category' => $category ]);
    }

    public function search(){
        $kword = $_GET['search'];
        $products = Product::where('title', 'LIKE', '%'.$kword.'%')->get();
        return view('search', ['products' => $products, 'search' => $kword ]);
    }

    public function cart(){
        $carts = OrderItem::where('sid', session_id())->get();
        return view('cart', ['carts' => $carts]);
    }

    public function addcart($id){
        
        $product = Product::find($id);
        $cart = new OrderItem();
        $cart->product_id = $id;
        $cart->price = $product->price;
        $cart->qty = 1;
        $cart->sid = session_id();
        $cart->save();
        return redirect()->back()->with('message', 'Product added into cart');
    }

    public function addcartpost(Request $request, $id){
        
        $product = Product::find($id);
        $cart = new OrderItem();
        $cart->product_id = $id;
        $cart->price = $product->price;
        $cart->qty = $request->qty;
        $cart->sid = session_id();
        $cart->save();
        return redirect()->back()->with('message', 'Product added into cart');
    }

    public function updatecart(Request $request, $id){
        
        $cart = OrderItem::find($id);
        $cart->qty = $request->qty;
        $cart->update();
        return redirect()->back()->with('message', 'Cart updated');
    }

    public function deleteCart($id){
        $cart = OrderItem::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'Cart item deleted');
    }

    public function checkout(){
        $carts = OrderItem::where('sid', session_id())->get();
        return view('checkout', ['carts' => $carts]);
    }

    public function order(){
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orders', ['orders' => $orders]);
    }

    public function postorder(Request $request){
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'area' => 'required|string',
            'address' => 'required|string',
        ]);

        $order = new Order();

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->area = $request->area;
        $order->address = $request->address;
        $order->total = $request->total;
        $order->charge = 60;
        $order->subtotal = $request->total + 60;
        $order->pay = $request->total + 60;
        $order->user_id = auth()->user()->id;
        $order->due = 0;

        $order->save();

        $sid = session_id();
        $carts = OrderItem::where('sid', $sid)->where('order_id', 0)->get();

        foreach($carts as $cart){
            $cart->order_id = $order->id;
            $cart->sid = null;
            $cart->update();
        }
        return redirect('/order')->with('message', 'Order Send Successful');
    }

    public function profile(){
        $products = Product::all();
        return view('profile', ['products' => $products]);
    }

    public function updateprofile(Request $request){
        $id = auth()->user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->address = $request->address;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        } 
        
        $user->update();
        return redirect('/profile')->with('message', 'Profile Updated');
    }

    public function saveList(){
        $uid = auth()->user()->id;
        $savelists = Savelist::where('user_id', $uid)->get();
        return view('save-list', ['savelists' => $savelists]);
    }

    public function saveListId($id){
        $uid = auth()->user()->id;
        $savelist = new Savelist();

        $savelist->user_id = $uid;
        $savelist->product_id = $id;

        $savelist->save();
        return redirect('/save-later')->with('message', 'Save product for later');
    }

    public function saveListDelete($id){
        $savelist = Savelist::find($id);
        $savelist->delete();
        return redirect('/save-later')->with('message', 'Save product deleted');
    }

    public function showPage($name){
        $page = Page::find(1);

        if($name == 'privacy'){
            $title = 'Privacy Policy';
            $content = $page->privacy;
        }else if($name == 'terms'){
            $title = 'Terms & Conditons';
            $content = $page->terms;
        }else if($name == 'return'){
            $title = 'Return Policy';
            $content = $page->return;
        }else if($name == 'payment'){
            $title = 'Payment Policy';
            $content = $page->payment;
        }else if($name == 'about'){
            $title = 'About Us';
            $content = $page->about;
        }else if($name == 'contact'){
            $title = 'Contact Us';
            $content = $page->contact;
        }

        return view('page', ['title' => $title, 'content' => $content]);
    }
}
