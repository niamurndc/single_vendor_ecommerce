@extends('layouts.chaldal')

@section('content')
<?php $total = 0 ; ?>
  <div class="p-md-5">
    <div class="">
      
      <div class="row py-2 py-md-0 px-md-4">
        <div class="col-md-8">
          <div class="card p-4">
            <h3 class="text-uppercase mb-4 border-bottom">Shopping cart</h3>
            @foreach($carts as $cart)
            <div class="row border-bottom p-3">
              <div class="col-3">
                <img src="/uploads/product/{{$cart->product->image}}" alt="img" class="cart-product-image">
              </div>
              <div class="col-9">
                <h5>{{$cart->product->title}}</h5>
                <p>Category: {{$cart->product->category != null ? $cart->product->category->title : 'No Category'}}</p>
                <h4 class="my-md-3">{{$total += $cart->price * $cart->qty}} BDT</h4>

                <div class="d-flex align-items-center justify-content-between">
                  <form action="/cart/update/{{$cart->id}}" method="post" class="d-flex align-items-center"> @csrf
                    <select name="qty" class="form-control form-control-sm cart-qty-box" required>
                      <option {{$cart->qty == 1 ? 'selected' : ''}} value="1">1</option>
                      <option {{$cart->qty == 2 ? 'selected' : ''}} value="2">2</option>
                      <option {{$cart->qty == 3 ? 'selected' : ''}} value="3">3</option>
                      <option {{$cart->qty == 4 ? 'selected' : ''}} value="4">4</option>
                      <option {{$cart->qty == 5 ? 'selected' : ''}} value="5">5</option>
                    </select>
                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                  </form>
                  <a href="/cart/delete/{{$cart->id}}" class="btn btn-danger btn-sm">Delete</a>
                </div>
                
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-4">
            <h4>Total: {{$total}} BDT</h4>
            <p>Shipping Cost: 60 BDT</p>
            <h4 class="border-top">Subtotal: {{$total + 60}} BDT</h4>

            <a href="/checkout" class="btn btn-warning btn-block mt-4">Proced to Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

               
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@endsection