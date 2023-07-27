<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class SellEntry extends Component
{
    // validation related
    public $error = '';
    public $perror = '';
    // product
    public $product_id = 0;
    public $price ;
    public $qty ;
    public $charge = 0;
    public $pay = 0;
    public $subtotal = 0;
    public $due = 0;

    // supplier Details
    public $name = '';
    public $phone = '';
    public $note = '';
    public $invoice = '';
    public $area = '';
    public $address = '';


    public function addCart(){
        if($this->product_id == 0 || $this->price == null || $this->qty == null){
            $this->error = 'Product ID, Price and Quantity is required';
        }else{
            $pitem = new OrderItem();

            $pitem->product_id = $this->product_id;
            $pitem->price = $this->price;
            $pitem->qty = $this->qty;
            $pitem->order_id = 0;

            $pitem->save();

            $product = Product::find($this->product_id);
            $product->qty -= $this->qty;
            $product->update();

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
    }

    public function createOrder($total){
        if($this->name == '' || $this->phone == '' || $this->area == '' || $this->address == ''){
            $this->perror = 'Name, Phone, Area, Address are required';
        }else{
            $order = new Order();

            $order->name = $this->name;
            $order->phone = $this->phone;
            $order->note = $this->note;
            $order->invc = $this->invoice;
            $order->area = $this->area;
            $order->address = $this->address;
            $order->type = 'Offline';
            $order->total = $total;
            $order->charge = $this->charge;
            $order->subtotal = $total + $this->charge;
            $order->pay = $this->pay;
            $order->due = $total + $this->charge - $this->pay;

            $order->save();

            $carts = OrderItem::where('order_id', 0)->get();

            foreach($carts as $cart){
                $cart->order_id = $order->id;
                $cart->update();
            }

            return redirect('/admin/sells');
        }
    }

    public function render()
    {
        $carts = OrderItem::where('order_id', 0)->get();
        $products = Product::all();
        return view('livewire.sell-entry', ['carts' => $carts, 'products' => $products]);
    }
}
