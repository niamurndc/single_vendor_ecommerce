@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Sliders</h2>
    <a href="/admin/sliders" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Slider</h6>
        <form action="/admin/slider/edit/{{$slider->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$slider->title}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="subtitle">SubTitle</label>
              <input type="text" name="subtitle" id="subtitle" value="{{$slider->subtitle}}" class="form-control @error('subtitle') is-invalid @enderror">
              @error('subtitle')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="link">Link</label>
              <input type="text" name="link" id="link" value="{{$slider->link}}" class="form-control @error('link') is-invalid @enderror">
              @error('link')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
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