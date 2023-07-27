@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Brands</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
      <div class="card px-3 py-3">
        <h6 class="mb-3">Add New Brand</h6>
        <form action="/admin/brand/create" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Add New</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card px-3 py-3 mt-5">
        <h6 class="mb-3">All Brands</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Slug</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($brands as $brand)
            <tr>
              <td>{{$brand->title}}</td>
              <td>{{$brand->slug}}</td>
              <td>
                <a href="/admin/brand/edit/{{$brand->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/brand/delete/{{$brand->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endsection
