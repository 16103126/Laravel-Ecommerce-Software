@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Manage Division</h2>      
      </div>
      <div class="card-body">
          @include('backend.partials.message')
      <table class="table table-hover table-striped" id="dataTabe">

        <thead>
          <tr>
              <th>Sl.</th>
              <th>Division Name</th>
              <th>Priority</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($divisions as $division)
          <tr>
              <td>#</td>
              <td>{{$division->name}}</td>
              <td>{{$division->priority}}</td>
              
              <td><a href="{{route('admin.division.edit', $division->id)}}" class="btn btn-success">Edit</a>
              <a href="#deleteModal{{$division->id}}" data-toggle="modal" class="btn btn-danger">delete</a>

<!-- Modal -->
<div class="modal fade" id="deleteModal{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{!! route('admin.division.delete', $division->id) !!}">
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
              
          <thead>
            <tr>
                <th>Sl.</th>
                <th>Division Name</th>
                <th>Priority</th>
                <th>Action</th>
            </tr>
          </thead>
          @endforeach
        </tbody>
      </table>
       
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection