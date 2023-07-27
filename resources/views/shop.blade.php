@extends('layouts.chaldal')

@section('content')

  <!-- First Product Show Category -->
  <div class="p-md-5">
    <div class="border border-radius p-4">
      <h3 class="text-center">ALL PRODUCTS</h3>
      <div class="card mt-4 p-4">
        <div class="row">
          @foreach($products as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection