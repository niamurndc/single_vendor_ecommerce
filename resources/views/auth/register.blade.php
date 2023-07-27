@extends('layouts.chaldal')

@section('content')

<div class="col-md-4 mt-5 mx-auto">
  <div class="card p-4">
    
    <h2 class="text-center">Register</h2>

    <form action="{{ route('register') }}" method="POST"> @csrf

    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required autofocus>
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" required autofocus>
      @error('phone')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
      @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="confirm-password">Confirm Password</label>
      <input type="password" name="password_confirmation" id="confirm-password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-warning btn-block my-4">Register</button>

    <p class="text-center"><a href="/register" class="text-dark">Already have an account? Login</a></p>
    
    </form>
  </div>
</div>
 <!-- / Cart view section -->
@endsection