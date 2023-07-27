@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>SEO Setting</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Configure Setting</h6>
        <form action="/admin/seo/edit" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-12">
              <label for="desc">Meta Description (important for seo)</label>
              <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$setting->desc}}</textarea>
              @error('desc')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12">
              <label for="author">Author Meta</label>
              <input type="text" name="author" id="author" value="{{$setting->author}}" class="form-control @error('author') is-invalid @enderror">
              @error('author')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12">
              <label for="tags">Meta Tags (important for seo)</label>
              <textarea name="tags" id="tags" class="form-control @error('tags') is-invalid @enderror">{{$setting->tags}}</textarea>
              @error('tags')
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