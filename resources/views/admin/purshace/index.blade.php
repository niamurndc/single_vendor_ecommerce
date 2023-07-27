@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Purshace</h2>
    <a href="/admin/purshace/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All purshaces</h6>
    <table class="table table-striped" id="example">
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
          <th scope="col">Action</th>
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
          <td>
            <a href="/admin/purshace/edit/{{$purshace->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="/admin/purshace/delete/{{$purshace->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
