@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Edit Brand</h2>      
      </div>
      <div class="card-body">

        <form method="post" action="{{route('admin.brand.update', $brand->id)}}" enctype="multipart/form-data">
          {{csrf_field()}}

          @include('backend.partials.message')
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{$brand->name}}" class="form-control">
          </div>

          <div class="form-group">
            <label>Description (optional)</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$brand->description}}</textarea>
          </div>       

      <div class="form-group"> 
        <label for="oldimage">Brand Old Image</label> <br>
         
          <img src="{!! asset('images/brands/'.$brand->image) !!}" width="100"><br>

          <label for="newimage">Brand New Image (optional)</label> 
          <input type="file" name="image" id="newimage" class="form-control">
      
          <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection