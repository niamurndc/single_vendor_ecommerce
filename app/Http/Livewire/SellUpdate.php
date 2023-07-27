<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class SellUpdate extends Component
{
    // validation related
    public $error = '';
    public $perror = '';
    // product
    public $pid = 0;
    public $product_id = 0;
    public $price ;
    public $qty ;
    public $charge = 0;
    public $pay = 0;
    public $subtotal = 0;
    public $due = 0;
    public $carts = [];

    // supplier Details
    public $name = '';
    public $phone = '';
    public $note = '';
    public $area = '';
    public $address = '';
    public $invc = '';


    public function addCart(){
        if($this->product_id == 0 || $this->price == null || $this->qty == null){
            $this->error = 'Product ID, Price and Quantity is required';
        }else{
            $pitem = new OrderItem();

            $pitem->product_id = $this->product_id;
            $pitem->price = $this->price;
            $pitem->qty = $this->qty;
            $pitem->order_id = $this->sid;

            $pitem->save();

            $product = Product::find($this->product_id);
            $product->qty -= $this->qty;
            $product->update();

            $this->getCart();
            $this->product_id = 0;
            $this->price = '';
            $this->qty = '' ;
            $this->error = '';

        }
    }

    public function deleteCart($id){
        $pitem = OrderItem::find($id);

        $product = Product::find($pitem->product_id);
        $product->qty += $pitem->qty;
        $product->update();

        $pitem->delete();
        $this->getCart();
    }

    public function createOrder($total){
        if($this->name == '' || $this->phone == '' || $this->area == '' || $this->address == '' ){
            $this->perror = 'Name, Phone, Area, Address are required';
        }else{
            $order = Order::find($this->sid);

            $order->name = $this->name;
            $order->phone = $this->phone;
            $order->note = $this->note;
            $order->invc = $this->invc;
            $order->area = $this->area;
            $order->address = $this->address;
            $order->total = $total;
            $order->charge = $this->charge;
            $order->subtotal = $total + $this->charge;
            $order->pay = $this->pay;
            $order->due = $total + $this->charge - $this->pay;

            $order->update();

            $carts = OrderItem::where('order_id', $this->sid)->get();

            foreach($carts as $cart){
                $cart->order_id = $order->id;
                $cart->update();
            }

            return redirect('/admin/sells');
        }
    }

    public function getCart(){
        $this->carts = OrderItem::where('order_id', $this->sid)->get(); 
    }

    public function mount($sell){
        $this->sid = $sell->id;
        $this->name = $sell->name;
        $this->phone = $sell->phone;
        $this->note = $sell->note;
        $this->area = $sell->area;
        $this->address = $sell->address;
        $this->invc = $sell->invc;
        $this->charge = $sell->charge;
        $this->pay = $sell->pay;

        $this->getCart();
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.sell-update', ['products' => $products]);
    }
}
