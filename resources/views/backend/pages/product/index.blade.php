@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Manage Product</h2>      
      </div>
      <div class="card-body">
          @include('backend.partials.message')
      <table class="table table-hover table-striped" id="dataTable">
        <thead>
          <tr>
              <th>Sl.</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
              <td>#</td>
              <td>{{$product->title}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->quantity}}</td>
              <td><a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-success">Edit</a>
                <a href="#deleteModal{{$product->id}}" data-toggle="modal" class="btn btn-danger">delete</a>

<!-- Modal -->
<div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{!! route('admin.product.delete', $product->id) !!}">
            {{ csrf_field() }}

            <button type="submit" class="btn btn-danger">Permanent Delete</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            </td>
              
          </tr>
              
          @endforeach

          <thead>
            <tr>
                <th>Sl.</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
          </thead>
        </tbody>
      </table>
       
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection