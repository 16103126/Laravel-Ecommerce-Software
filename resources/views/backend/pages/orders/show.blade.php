@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        View Orde #LE{{$order->id}}
      </div>      
      <div class="card-body">
          @include('backend.partials.message')
          <h3>Order Informations</h3>
          <div class="row">
              <div class="col-md-6 border-right">
                  <p><strong>Orderer Name:</strong>{{$order->name}}</p>
                  <p><strong>Orderer Phone:</strong>{{$order->phone_no}}</p>
                  <p><strong>Orderer Email:</strong>{{$order->email}}</p>
                  <p><strong>Orderer Shipping Address:</strong>{{$order->shipping_address}}</p>
              </div>
              <div class="col-md-6">
                  <p><strong>Order Payment Method:</strong>{{$order->payment->name}}</p>
                  <p><strong>Order Payment Transaction:</strong>{{$order->transaction_id}}</p>     
            </div>
          </div>
          <hr>
          <h3>Ordered Item:</h3>
          @if($order->carts->count()>0)
          <table class="table table-bordered table-stripe">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Product Quantity</th>
                      <th>Unit Price</th>
                      <th>Sub Total Price</th>
                      <th>Delete</th>
                   </tr>
              </thead>
              <tbody>
                  @php
                      $total_price=0;
                  @endphp
                  @foreach ($order->carts as $cart)
                      
                  <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td>
                          <a href="{{route('products.show', $cart->product->slug)}}">{{$cart->product->title}}
                          </td>
                      <td>
                          @if($cart->product->images->count()>0)
                          <img src="{{asset('images/products/'. $cart->product->images->first()->image)}}" width="60px;">
                          @endif
                      </td>
                      <td>
                          <form class="form-inline" action="{{route('carts.update', $cart->id)}}" method="post">
                              @csrf
                              <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                              <button type="submit" class="btn btn-success ml-1">Update</button>
                          </form>
                      </td>
                      <td>
                          {{$cart->product->price}} Taka
                      </td>
                      <td>
                          @php
                              $total_price+=$cart->product->price*$cart->product_quantity;
                          @endphp
                          {{$cart->product->price * $cart->product_quantity}} Taka               
                      </td>
                      <td>
                          <form class="form-inline" action="{{route('carts.delete', $cart->id)}}" method="post">
                              @csrf
                              <input type="hidden" name="cart" class="form-control">
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
      
                  <tr>
                      <td colspan="4"></td>
                      <td>Total Amount:</td>
                      <td colspan="2">{{$total_price}} Taka</td>
                  </tr>
      
              </tbody>
      @endif

      
          </table>
          <hr>
          <form action="{{route('admin.order.charge', $order->id)}}" method="POST">
            @csrf
            <label for="shipping_charge">Shipping Cost</label>
            <input type="number" id="shipping_charge" name="shipping_charge" value="{{$order->shipping_charge}}"><br>
            
            <label for="custom_discount">Custom Discount</label>
            <input type="number" id="custom_discount" name="custom_discount" value="{{$order->custom_discount}}"><br>

            <input type="submit" value="update" class="btn btn-danger"> 
            <a type="" href="{{route('admin.order.invoice', $order->id)}}" class="btn btn-info ml-2">Generate Invoice</a>
            
        </form>

          <hr>

      <form action="{{route('admin.order.completed', $order->id)}}" method="POST" style="display:inline-block!important;">
          @csrf
          @if($order->is_completed)
          <input type="submit" value="cancel order" class="btn btn-danger">
          @else
          <input type="submit" value="completed order" class="btn btn-success"> 
          @endif
      </form>

      <form action="{{route('admin.order.paid', $order->id)}}" method="POST" style="display:inline-block!important;">
        @csrf
        @if($order->is_paid)
        <input type="submit" value="cancel Payment order" class="btn btn-danger">
        @else
        <input type="submit" value="paid order" class="btn btn-success"> 
        @endif
    </form>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection