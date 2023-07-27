<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Purshace;
use App\Models\PurshaceItem;
use Livewire\Component;

class PurshaceUpdate extends Component
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


    public function addCart(){
        if($this->product_id == 0 || $this->price == null || $this->qty == null){
            $this->error = 'Product ID, Price and Quantity is required';
        }else{
            $pitem = new PurshaceItem();

            $pitem->product_id = $this->product_id;
            $pitem->price = $this->price;
            $pitem->qty = $this->qty;
            $pitem->order_id = $this->pid;

            $pitem->save();

            $product = Product::find($this->product_id);
            $product->qty += $this->qty;
            $product->update();

            $this->getCart();
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
        $this->getCart();
    }

    public function createOrder($total){
        if($this->name == '' || $this->phone == ''  ){
            $this->perror = 'Name, Phone are required';
        }else{
            $purshace = Purshace::find($this->pid);

            $purshace->name = $this->name;
            $purshace->phone = $this->phone;
            $purshace->note = $this->note;
            $purshace->total = $total;
            $purshace->charge = $this->charge;
            $purshace->subtotal = $total + $this->charge;
            $purshace->pay = $this->pay;
            $purshace->due = $total + $this->charge - $this->pay;

            $purshace->update();

            $carts = PurshaceItem::where('order_id', $this->pid)->get();

            foreach($carts as $cart){
                $cart->order_id = $purshace->id;
                $cart->update();
            }

            return redirect('/admin/purshaces');
        }
    }

    public function getCart(){
        $this->carts = PurshaceItem::where('order_id', $this->pid)->get(); 
    }

    public function mount($id){
        $this->pid = $id->id;
        $this->name = $id->name;
        $this->phone = $id->phone;
        $this->note = $id->note;
        $this->charge = $id->charge;
        $this->pay = $id->pay;

        $this->getCart();
    }


    public function render()
    {
        $products = Product::all();
        return view('livewire.purshace-update', ['products' => $products]);
    }
}
