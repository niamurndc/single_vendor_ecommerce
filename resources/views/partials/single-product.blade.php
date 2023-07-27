<div class="col-6 col-sm-4 col-md-3 col-lg-2 p-1 p-md-2">
  <a href="/product/{{$product->id}}" class="text-dark">
  <img src="/uploads/product/{{$product->image}}" alt="product-image" class="product-image">
  <div class="product-title my-2">
    <p class="mb-0">{{$product->title}}</p>
  </div>
  
  <h5>{{$product->price}} BDT</h5>
  <a href="/add-cart/{{$product->id}}" class="btn btn-warning  btn-sm">Add Cart</a>
  </a>
</div>