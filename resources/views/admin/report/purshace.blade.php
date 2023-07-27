@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Purshace Report</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <div class="row mb-4">
      <div class="col-md-6">
        <h6 class="mb-3">Date Wise Purshace</h6>
      </div>
      <div class="col-md-6 text-right">
        <form action="/admin/report/sell" method="post">
          @csrf 
          <div class="row">
            <div class="col-md-5">
              <input type="date" name="start" class="form-control">
            </div>
            <div class="col-md-5">
              <input type="date" name="end" class="form-control">
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Date</th>
          <th scope="col">Invc.</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Subtotal</th>
          <th scope="col">Paid</th>
          <th scope="col">Due</th>
        </tr>
      </thead>
      <tbody>
        @foreach($purshaces as $purshace)
        <tr>
          <td>{{$purshace->id}}</td>
          <td>{{$purshace->created_at->format('d-M-y')}}</td>
          <td>{{$purshace->note}}</td>
          <td>{{$purshace->name}}</td>
          <td>{{$purshace->phone}}</td>
          <td>{{$purshace->subtotal}}</td>
          <td>{{$purshace->pay}}</td>
          <td>{{$purshace->due}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
