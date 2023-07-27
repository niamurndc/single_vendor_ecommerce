@extends('layouts.chaldal')

@section('content')

  <div class="p-md-5">
    <div class="">
      <div class="col-md-6 mx-auto">
        <div class="card p-4 mb-4">
        <?php $total = 0 ?>
          <h4 class="text-uppercase mb-4">order details</h4>
          @foreach($carts as $cart)
            <p class="mb-1 border-bottom">{{$cart->product->title}} <strong> x  {{$cart->qty}}</strong> -- {{$total += $cart->qty * $cart->price}}</p>
            
          @endforeach
          <div class="text-right">
            <p class="mb-1">Total: {{$total}}</p>
            <p class="mb-1">Shipping cost: 60</p>
            <h4>Subtotal: {{$total + 60}}</h4>
            <a href="/cart" class="btn btn-danger btn-sm">Go Back</a>
          </div>
          
        </div>

        <!-- billing details -->
        <div class="card p-4 mb-4">
          <h4 class="text-uppercase mb-4">Billing details</h4>
          <h5>Name: {{Auth::user()->name}}</h5>
          <h5>Phone: {{Auth::user()->phone}}</h5>
          <p>Address: {{Auth::user()->address}}</p>
        </div>

        <!-- shipping details -->
        <div class="card p-4 mb-4">
          <h4 class="text-uppercase mb-4">shipping details</h4>
          <form action="/order" method="post"> @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                <div class="invalid-feedback">
                  <p>{{$message}}</p>
                </div>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required>
                @error('phone')
                <div class="invalid-feedback">
                  <p>{{$message}}</p>
                </div>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="area">Area</label>
                <select type="number" name="area" id="area" class="form-control @error('area') is-invalid @enderror" required>
                  <option value="tangail">Tangail</option>
                  <option value="dhaka">Tangail</option>
                  <option value="chittagong">Chittagong</option>
                </select>
                @error('area')
                <div class="invalid-feedback">
                  <p>{{$message}}</p>
                </div>
                @enderror
              </div>

              <div class="form-group col-md-12">
                <label for="address">Address</label>
                <textarea rows="3" name="address" id="address" class="form-control @error('address') is-invalid @enderror" required></textarea>
                @error('address')
                <div class="invalid-feedback">
                  <p>{{$message}}</p>
                </div>
                @enderror
              </div>

              <input type="hidden" name="total" id="total" value="{{$total}}" class="d-none">
            </div>

            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                  Agree to terms and conditions
                </label>
              </div>
            </div>

            <ul class="list-group">
              <li class="list-group-item">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="cod" name="payment" class="custom-control-input">
                  <label class="custom-control-label" for="cod"><i class="fa fa-money"></i> Cash on Delivery </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="online" name="payment" class="custom-control-input">
                  <label class="custom-control-label" for="online"><i class="fa fa-cc-visa"></i> Visa Card</label>
                </div>
              </li>
            </ul>

            <button type="submit" class="btn btn-warning btn-lg btn-block mt-4">Place Order</button>
          </form>
        </div>
      </div>
    </div>
  </div>

 <!-- / Cart view section -->
@endsection