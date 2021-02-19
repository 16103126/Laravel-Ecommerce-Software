@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Edit Division</h2>      
      </div>
      <div class="card-body">

        <form method="post" action="{{route('admin.division.update', $division->id)}}" enctype="multipart/form-data">
          {{csrf_field()}}

          @include('backend.partials.message')
          <div class="form-group">
            <label>Division Name</label>
            <input type="text" name="name" value="{{$division->name}}" class="form-control">
          </div>

          <div class="form-group">
            <label>Priority</label>
            <input type="text" name="priority" class="form-control" value="{{$division->priority}}">
          </div>
      
          <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection