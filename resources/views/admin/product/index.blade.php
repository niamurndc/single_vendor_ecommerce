@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Products</h2>
    <a href="/admin/product/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All Products</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Slug</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Brand</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td><img src="/uploads/product/{{$product->image}}" alt="Image" height="40px" width="40px"></td>
          <td>{{$product->title}}</td>
          <td>{{$product->slug}}</td>
          <td>{{$product->price}} <br> <strike>{{$product->offprice}}</strike></td>
          <td>@if($product->category_id != 0){{$product->category->title}} @endif</td>
          <td>@if($product->brand_id != 0){{$product->brand->title}} @endif</td>
          <td>
            <a href="/admin/product/edit/{{$product->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="/admin/product/delete/{{$product->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
