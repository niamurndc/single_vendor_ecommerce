@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Products</h2>
    <a href="/admin/products" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-5">
        <h6 class="mb-3">Edit Product</h6>
        <form action="/admin/product/edit/{{$product->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6 mb-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$product->title}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-6 mb-4">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4 mb-4">
              <label for="price">Price</label>
              <input type="number" name="price" id="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror">
              @error('price')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-4 mb-4">
              <label for="offprice">Offer Price</label>
              <input type="number" name="offprice" id="offprice" value="{{$product->offprice}}" class="form-control">
            </div>
            <div class="form-group col-md-4 mb-4">
              <label for="qty">Quantity</label>
              <input type="number" name="qty" id="qty" value="{{$product->qty}}" class="form-control @error('qty') is-invalid @enderror">
              @error('qty')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
              <label for="category">Category</label>
              <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                <option {{$product->category_id == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->title}}</option>
                @endforeach
              </select>
              @error('category')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-6 mb-4">
              <label for="brand">Brand</label>
              <select name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                <option {{$product->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->title}}</option>
                @endforeach
              </select>
              @error('brand')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="desc">Description</label>
              <textarea name="desc" id="desc" rows="4" class="form-control">{{$product->desc}}</textarea>
            </div>

            <div class="form-group col-md-12">
              <label for="tags">Tags</label>
              <textarea name="tags" id="tags" rows="4" class="form-control">{{$product->tags}}</textarea>
            </div>

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection