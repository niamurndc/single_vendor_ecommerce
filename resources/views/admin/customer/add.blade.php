@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Customers</h2>
    <a href="/admin/customers" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-5">
        <h6 class="mb-3">Add Customer</h6>
        <form action="/admin/customer/create" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6 mb-4">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
              @error('name')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            

            <div class="form-group col-md-6 mb-4">
              <label for="phone">Phone</label>
              <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
              @error('phone')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-12 mb-4">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" class="form-control">
            </div>
            <p class="text-danger">Default Customer password is 12345678</p>

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Create</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection