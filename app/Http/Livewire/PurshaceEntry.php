<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Purshace;
use App\Models\PurshaceItem;
use Livewire\Component;

class PurshaceEntry extends Component
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


    public function addCart(){
        if($this->product_id == 0 || $this->price == null || $this->qty == null){
            $this->error = 'Product ID, Price and Quantity is required';
        }else{
            $pitem = new PurshaceItem();

            $pitem->product_id = $this->product_id;
            $pitem->price = $this->price;
            $pitem->qty = $this->qty;
            $pitem->order_id = 0;

            $pitem->save();

            $product = Product::find($this->product_id);
            $product->qty += $this->qty;
            $product->update();

            $this->product_id = 0;
            $this->price = '';
            $this->qty = '' ;
            $this->error = '';
        }
    }

    public function deleteCart($id){
        $pitem = PurshaceItem::find($id);

        $product = Product::find($pitem->product_id);
        $product->qty -= $pitem->qty;
        $product->update();

        $pitem->delete();
    }

    public function createOrder($total){
        if($this->name == '' || $this->phone == ''  ){
            $this->perror = 'Name, Phone are required';
        }else{
            $purshace = new Purshace();

            $purshace->name = $this->name;
            $purshace->phone = $this->phone;
            $purshace->note = $this->note;
            $purshace->total = $total;
            $purshace->charge = $this->charge;
            $purshace->subtotal = $total + $this->charge;
            $purshace->pay = $this->pay;
            $purshace->due = $total + $this->charge - $this->pay;

            $purshace->save();

            $carts = PurshaceItem::where('order_id', 0)->get();

            foreach($carts as $cart){
                $cart->order_id = $purshace->id;
                $cart->update();
            }

            return redirect('/admin/purshaces');
        }
    }

    public function render()
    {
        $carts = PurshaceItem::where('order_id', 0)->get();
        $products = Product::all();
        return view('livewire.purshace-entry', ['products' => $products, 'carts' => $carts]);
    }
}
