@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Add Category</h2>      
      </div>
      <div class="card-body">

        <form method="post" action="{{route('admin.category.create.store')}}" enctype="multipart/form-data">
          {{csrf_field()}}

          @include('backend.partials.message')

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label>Parent Category (optional)</label>
            <select class="from-control" name="parent_id">
              <option value="">Please select a parent category</option>
              @foreach ($main_categories as $category)
              <option value="{{$category->id}}">{{$category->name}} </option>
              @endforeach  
            </select>
          </div>
          
         

      <div class="form-group"> 
        <label for="image">Category Image (optional)</label>
          <input type="file" name="image" id="image" class="form-control">
      </div>
      
          <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection