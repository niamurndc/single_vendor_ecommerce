@extends('layouts.chaldal')

@section('content')
  <!-- Start slider -->
  @include('partials.slider')
  <!-- / slider -->
  <!-- product Categories -->
  <div class="p-md-5">
    <div class="border border-radius p-4">
      <h3 class="text-center">PRODUCT CATEGORIES</h3>
      <div class="row mt-4">
        @foreach(App\Models\Category::where('parent_id', null)->limit($setting->cat_num)->get() as $category)
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
          <div class="card p-2">
            <div class="row">
              <div class="col-7 text-center mt-2 mt-md-3">
                <a href="/category/{{$category->id}}" class="text-dark category-text"><h5>{{$category->title}}</h5></a>
              </div>
              <div class="col-5">
                <img src="/uploads/category/{{$category->image}}" alt="" width="100%">
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- / product categories end -->


  <!-- Trending Products Section -->
  <div class="p-md-5">
    <div class="border border-radius p-4">
    <h3 class="text-center text-uppercase">{{$feature->title1}}</h3>
      <p class="text-center"><a href="/shop" class="text-dark">See all</a></p>
      <div class="card mt-4 p-4">
        <div class="row">
          @foreach(App\Models\Product::limit($feature->number1)->orderBy('id', 'desc')->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / Trending Products Section -->

  <!-- First Product Show Category -->
  <div class="p-md-5">
    <div class="border border-radius p-4">
    <h3 class="text-center text-uppercase">{{$feature->title2}}</h3>
      <p class="text-center"><a href="/" class="text-dark">Shop more</a></p>
      <div class="card mt-4 p-4">
        <div class="row">
          @foreach(App\Models\Product::where('category_id', $feature->cat_id2)->limit($feature->number2)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

  <!-- First Product Show Category -->
  <div class="p-md-5">
    <div class="border border-radius p-4">
      <h3 class="text-center text-uppercase">{{$feature->title3}}</h3>
      <p class="text-center"><a href="/category/{{$feature->cat_id3}}" class="text-dark">Shop more</a></p>
      <div class="card mt-4 p-4">
        <div class="row">
          @foreach(App\Models\Product::where('category_id', $feature->cat_id3)->limit($feature->number3)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
</div>



@endsection