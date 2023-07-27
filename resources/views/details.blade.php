@extends('layouts.chaldal')

@section('content')
  <!-- First Product Show Category -->
  <div class="p-md-5">
    <div class="border border-radius p-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card p-4">
            <div class="row">
              <div class="col-md-5">
                <img src="/uploads/product/{{$product->image}}" class="product-details-image">
              </div>
              <div class="col-md-7">
                <h4 class="mt-4 mt-md-0">{{$product->title}}</h4>

                <p class="text-secondary mt-4 border-bottom">Category: {{$product->cateogry != null ? $product->category->title : 'No category'}}</p>

                <h2 class="text-dark my-5">{{$product->price}} BDT</h2>

                <form action="/add-cart/{{$product->id}}" method="post">@csrf 
                <div class="col-md-6 pl-0">
                  <select name="qty" id="qty" class="form-control" required>
                    <option value="">Quantity</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>

                <div class="cart-button-grp mt-4 row px-3">
                  <a href="/save-later/{{$product->id}}" class="btn btn-outline-warning col-6">Save For Later</a>
                  <button type="submit" class="btn btn-warning col-6">Add to Cart</button>
                </div>
                
              </div>
              </form>

              <div class="col-md-12 mt-5">
                {{$product->desc}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3">
            <p class="pt-4"><i class="fa fa-money"></i> Cash on Delivery Avilable</p>
            <p><i class="fa fa-truck"></i> Free Shipping</p>
            <p class="mb-4"><i class="fa fa-refresh"></i> 7 days Easy Return</p>
          </div>
        </div>
      </div>   
    </div>
  </div>

  <!-- First Product Show Category -->
  <div class="p-md-5">
    <div class="border border-radius p-4">
      <h3 class="text-center text-uppercase">releted products</h3>
      <p class="text-center"><a href="/" class="text-dark">Shop more</a></p>
      <div class="card mt-4 p-4">
        <div class="row">
          @foreach(App\Models\Product::all() as $product)
          <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-1 p-md-2">
              <a href="/product/{{$product->id}}" class="text-dark">
              <img src="/uploads/product/{{$product->image}}" alt="product-image" class="product-image">
              <div class="product-title my-2">
                <p class="mb-0">{{$product->title}}</p>
              </div>
              
              <h5>{{$product->price}} BDT</h5>
              <a href="/product/{{$product->id}}" class="btn btn-warning  btn-sm">Add Cart</a>
              </a>
          </div>
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection