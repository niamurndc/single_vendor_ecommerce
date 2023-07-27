<div class="container">

  <div class="card px-3 py-3 mb-5">
    <h6 class="mb-3">Supplier Details</h6>
        @if($perror != '')
            <p class="text-danger">{{$perror}}</p>
        @endif
      <div class="row">
        <div class="form-group col-md-3">
          <label for="name">Name</label>
          <input type="text" wire:model="name" class="form-control">
        </div>
        <div class="form-group col-md-3">
          <label for="phone">Phone</label>
          <input type="number" wire:model="phone" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label for="note">Shipment No. (optional)</label>
          <input type="text" wire:model="note" class="form-control">
        </div>
       
      </div>
  </div>
  <div class="card p-3 mb-5">
    <h6 class="mb-4">Add Product To List</h6>
    <form wire:submit.prevent="addCart" method="post">
      @csrf 
      <div class="row">
        <div class="form-group col-md-4">
          <label>Product</label>
          <select wire:model="product_id" class="form-control ">
            <option value="0">Select a product</option>
            @foreach($products as $pro)
            <option value="{{$pro->id}}">{{$pro->title}}</option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group col-md-2">
          <label for="price">Price</label>
          <input type="number" wire:model="price" id="price" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="qty">Quantity</label>
          <input type="number" wire:model="qty" id="qty" class="form-control">
        </div>

        
        

        <div class="col-md-4 text-left">
          <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-plus-circle"></i> Add</button>
        </div>
        <div class="col-md-4">
        @if($error != '')
            <p class="text-danger">{{$error}}</p>
        @endif
        </div>
      </div>
    </form>

    <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <?php $total = 0; ?>
      <tbody>
        @foreach($carts as $cart)
        <tr>
          <td>{{$cart->product->title}}</td>
        
          <td> {{$cart->price}}</td>
          <td>{{$cart->qty}}</td>
          <td>{{$total += $cart->price * $cart->qty}}</td>
          <td>
            <button wire:click="deleteCart({{$cart->id}})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="3">Total</td>
          <td colspan="2" id="total">{{$total}}</td>
        </tr>
        <tr>
          <td colspan="3">Charge</td>
          <td colspan="2"><input type="number" wire:model="charge" class="form-control"></td>
        </tr>
        <tr>
          <td colspan="3">Subtotal</td>
          <td colspan="2">
              <input type="number" class="form-control" value="{{ is_numeric($charge) ? $total + $charge : $total}}" readonly>
          </td>
        </tr>
        <tr>
          <td colspan="3">Payment</td>
          <td colspan="2"><input type="number" wire:model="pay" class="form-control"></td>
        </tr>
        <tr>
          <td colspan="3">Due</td>
          <td colspan="2"><input type="number" class="form-control" value="{{(is_numeric($charge) && is_numeric($pay)) ? $total + $charge - $pay : 0}}" readonly> </td>
        </tr>
        
      </tbody>
    </table>

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" wire:click="createOrder({{$total}})">Make Purshace</button>
    </div>
  </div>


  
</div>