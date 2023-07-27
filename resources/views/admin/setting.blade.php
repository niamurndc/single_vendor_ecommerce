@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Site Setting</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Configure Setting</h6>
        <form action="/admin/setting/edit" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$setting->title}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="subtitle">Subtitle</label>
              <input type="text" name="subtitle" id="subtitle" value="{{$setting->subtitle}}" class="form-control @error('subtitle') is-invalid @enderror">
              @error('subtitle')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" value="{{$setting->address}}" class="form-control @error('address') is-invalid @enderror">
              @error('address')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" value="{{$setting->email}}" class="form-control @error('email') is-invalid @enderror">
              @error('email')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            

            <div class="form-group col-md-6">
              <label for="phone">Phone</label>
              <input type="text" name="phone" id="phone" value="{{$setting->phone}}" class="form-control @error('phone') is-invalid @enderror">
              @error('phone')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="facebook">Facebook</label>
              <input type="text" name="facebook" id="facebook" value="{{$setting->facebook}}" class="form-control @error('facebook') is-invalid @enderror">
              @error('facebook')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="twitter">Twitter</label>
              <input type="text" name="twitter" id="twitter" value="{{$setting->twitter}}" class="form-control @error('twitter') is-invalid @enderror">
              @error('twitter')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>


            <div class="form-group col-md-6">
              <label for="instagram">Instagram</label>
              <input type="text" name="instagram" id="instagram" value="{{$setting->instagram}}" class="form-control @error('instagram') is-invalid @enderror">
              @error('instagram')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="youtube">YouTube</label>
              <input type="text" name="youtube" id="youtube" value="{{$setting->youtube}}" class="form-control @error('youtube') is-invalid @enderror">
              @error('youtube')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="shipping_cost">Shipping Cost</label>
              <input type="number" name="shipping_cost" id="shipping_cost" value="{{$setting->shipping_cost}}" class="form-control @error('shipping_cost') is-invalid @enderror">
              @error('shipping_cost')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            
            
            <div class="form-group col-md-6">
              <label for="cat_num">Number of category to show</label>
              <input type="number" name="cat_num" id="cat_num" value="{{$setting->cat_num}}" class="form-control @error('cat_num') is-invalid @enderror">
              @error('cat_num')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
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