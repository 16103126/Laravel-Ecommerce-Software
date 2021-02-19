@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Manage Order</h2>      
      </div>
      <div class="card-body">
          @include('backend.partials.message')
      <table class="table table-hover table-striped" id="dataTable">
          <thead>
          <tr>
              <th>#</th>
              <th>Order Id</th>
              <th>Orderer Name</th>
              <th>Orderer Phone No</th>
              <th>Orderer Status</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($orders as $order)
          <tr>
              <td>{{$loop->index +1}}</td>
              <td>LE{{$order->id}}</td>
              <td>{{$order->name}}</td>
              <td>{{$order->phone_no}}</td>
              <td>
                <p>
                    @if($order->is_seen_by_admin)
                    <button type="button" class="btn btn-success btn-sm">seen</button>
                    @else 
                    <button type="button" class="btn btn-info btn-sm">unseen</button>
                    @endif
                  </p>
                  <p>
                    @if($order->is_completed)
                    <button type="button" class="btn btn-success btn-sm">completed</button>
                    @else 
                    <button type="button" class="btn btn-info btn-sm">Not completed</button>
                    @endif
                  </p>
                  <p>
                      @if($order->is_paid)
                      <button type="button" class="btn btn-success btn-sm">paid</button>
                      @else 
                      <button type="button" class="btn btn-info btn-sm">paid</button>
                      @endif
                    </p>
              </td>

              
              
              <td><a href="{{route('admin.order.show', $order->id)}}" class="btn btn-success">view order</a>
                <a href="#deleteModal{{$order->id}}" data-toggle="modal" class="btn btn-danger">delete</a>

<!-- Modal -->
<div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{!! route('admin.order.delete', $order->id) !!}">
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

          <tfoot>
            <tr>
                <th>#</th>
                <th>Order Id</th>
                <th>Orderer Name</th>
                <th>Orderer Phone No</th>
                <th>Orderer Status</th>
                <th>Action</th>
            </tr>
          </tfoot>
        </tbody>
      </table>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection