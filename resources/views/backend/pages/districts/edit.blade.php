@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Edit Division</h2>      
      </div>
      <div class="card-body">

        <form method="post" action="{{route('admin.district.update', $district->id)}}" enctype="multipart/form-data">
          {{csrf_field()}}

          @include('backend.partials.message')
          <div class="form-group">
            <label>Division Name</label>
            <input type="text" name="name" value="{{$district->name}}" class="form-control">
          </div>

          <div class="form-group">
            <label for="division_id">Select a division for this district</label>
            <select class="from-control" name="division_id">
              <option value="">Please select a division for the district</option>
              @foreach ($divisions as $division)
              <option value="{{$division->id}}" {{$district->division->id==$division->id ? 'selected':''}}>{{$division->name}} </option>
              @endforeach  
            </select>
          </div>
      
          <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection