



@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Online Order</h2>
    <a href="/admin/orders" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="card p-3 mb-5">
        <h6>Order Details</h6>
        <div class="d-flex justify-content-between align-items-center">
          
          <h5 class="mb-4 text-primary">ID: #{{$order->id}}</h5>
          <div>
            @if($order->status == 0)
            <span class="badge bg-info">Processing</span>
            @elseif($order->status == 1)
            <span class="badge bg-warning">Out For Delivery</span>
            @elseif($order->status == 2)
            <span class="badge bg-success">Delivered</span>
            @elseif($order->status == 3)
            <span class="badge bg-danger">Cancel</span>
            @endif
          </div>
        </div>

        <h6>Invoice No.: {{$order->invc}}</h6>
        <p>Name: {{$order->name}}</p>
        <p>Phone: {{$order->phone}}</p>
        <p>Area: {{$order->area}}</p>
        <p>Address: {{$order->address}}</p>
        <p>Total: {{$order->total}}</p>
        <p>Delivery Charge: {{$order->charge}}</p>
        <p>Subtotal: {{$order->subtotal}}</p>
        <h6>Order Time: {{$order->created_at->format('d-M-Y')}}</h6>

        <p>Status</p>
        <form action="/admin/order/edit/{{$order->id}}" method="post">
          @csrf 
          <select name="status" class="form-control">
            <option {{ $order->status == 0 ? 'selected' : ''}} value="0">Processig</option>
            <option {{ $order->status == 1 ? 'selected' : ''}} value="1">Out For Delivery</option>
            <option {{ $order->status == 2 ? 'selected' : ''}} value="2">Delivered</option>
            <option {{ ($order->status == 3) ? 'selected' : ''}} value="3">Cancel</option>
          </select>

          <button type="submit" class="btn btn-primary mt-3">Update Status</button>
        </form>
      </div>

      <div class="card p-3 mb-5">
        <h6>Product Details</h6>
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <?php $total = 0; ?>
          <tbody>
            @foreach($order->carts as $cart)
            <tr>
              <td>{{$cart->product->title}}</td>
              <td> {{$cart->price}}</td>
              <td>{{$cart->qty}}</td>
              <td>{{$total += $cart->price * $cart->qty}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection