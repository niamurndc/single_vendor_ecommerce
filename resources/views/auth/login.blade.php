@extends('layouts.chaldal')

@section('content')

<div class="col-md-4 mt-5 mx-auto">
  <div class="card p-4">
    
    <h2 class="text-center">Login</h2>

    <form action="{{ route('login') }}" method="POST"> @csrf

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
      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required>
      @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
    <a href="#" class="text-dark">Lost your password?</a>

    <button type="submit" class="btn btn-warning btn-block my-4">Login</button>

    <p class="text-center"><a href="/register" class="text-dark">Don't have account? Register</a></p>
    
    </form>
  </div>
</div>
 <!-- / Cart view section -->
@endsection